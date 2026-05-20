<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use App\Models\Visit;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TrackVisit
{
    private const BOT_PATTERN = '/bot|crawl|spider|slurp|bing|yandex|duckduck|baidu|yahoo|facebookexternalhit|preview|fetch|curl|wget|headless/i';

    private const SKIP_PREFIXES = ['admin', 'livewire', 'filament', '_ignition', 'telescope'];

    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);

        if (! $this->shouldTrack($request, $response)) {
            return $response;
        }

        Visit::create([
            'path' => mb_substr($request->path(), 0, 2048),
            'ip_hash' => hash('sha256', (string) $request->ip()),
            'user_agent' => mb_substr((string) $request->userAgent(), 0, 1024),
            'referer' => mb_substr((string) $request->headers->get('referer'), 0, 2048) ?: null,
            'session_id' => $request->hasSession() ? $request->session()->getId() : null,
        ]);

        return $response;
    }

    private function shouldTrack(Request $request, Response $response): bool
    {
        if (! $request->isMethod('GET')) {
            return false;
        }

        if ($this->isIgnoredIp((string) $request->ip())) {
            return false;
        }

        if ($response->getStatusCode() >= 400) {
            return false;
        }

        $path = $request->path();

        foreach (self::SKIP_PREFIXES as $prefix) {
            if (str_starts_with($path, $prefix)) {
                return false;
            }
        }

        $ua = (string) $request->userAgent();

        if ($ua === '' || preg_match(self::BOT_PATTERN, $ua) === 1) {
            return false;
        }

        return true;
    }

    private function isIgnoredIp(string $ip): bool
    {
        $entries = array_filter(array_map('trim', explode(',', (string) config('analytics.ignored_ips'))));

        foreach ($entries as $entry) {
            if (str_contains($entry, '/')) {
                if ($this->ipInCidr($ip, $entry)) {
                    return true;
                }

                continue;
            }

            if ($ip === $entry) {
                return true;
            }
        }

        return false;
    }

    private function ipInCidr(string $ip, string $cidr): bool
    {
        [$subnet, $bits] = array_pad(explode('/', $cidr, 2), 2, null);

        $ipLong = ip2long($ip);
        $subnetLong = ip2long((string) $subnet);

        if ($ipLong === false || $subnetLong === false || $bits === null) {
            return false;
        }

        $bits = (int) $bits;

        if ($bits < 0 || $bits > 32) {
            return false;
        }

        $mask = $bits === 0 ? 0 : (-1 << (32 - $bits)) & 0xFFFFFFFF;

        return ($ipLong & $mask) === ($subnetLong & $mask);
    }
}
