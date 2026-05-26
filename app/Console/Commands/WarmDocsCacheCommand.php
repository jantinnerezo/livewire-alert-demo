<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Contracts\Http\Kernel as HttpKernel;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WarmDocsCacheCommand extends Command
{
    protected $signature = 'docs:warm-cache';

    protected $description = 'Render docs pages once to warm expensive view caches.';

    public function handle(HttpKernel $kernel): int
    {
        $paths = collect(config('docs.pages'))
            ->pluck('path')
            ->unique()
            ->values();

        $this->info("Warming {$paths->count()} docs pages...");

        $failed = false;

        foreach ($paths as $path) {
            $response = $this->renderPath($kernel, $path);
            $statusCode = $response->getStatusCode();

            if ($statusCode >= 400) {
                $failed = true;
                $this->error("{$path} {$statusCode}");

                continue;
            }

            $this->line("{$path} {$statusCode}");
        }

        if ($failed) {
            return self::FAILURE;
        }

        $this->info('Docs cache warmed.');

        return self::SUCCESS;
    }

    private function renderPath(HttpKernel $kernel, string $path): Response
    {
        $request = Request::create($this->urlFor($path), 'GET', server: [
            'HTTP_USER_AGENT' => 'LivewireAlertDocsCacheWarmerBot/1.0',
        ]);

        $response = $kernel->handle($request);

        $kernel->terminate($request, $response);

        return $response;
    }

    private function urlFor(string $path): string
    {
        return rtrim((string) config('app.url'), '/').($path === '/' ? '' : $path);
    }
}
