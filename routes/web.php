<?php

declare(strict_types=1);

use Carbon\CarbonImmutable;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

$docPages = config('docs.pages');
$docPaths = collect($docPages)->pluck('path');

Route::get('/sitemap.xml', function () use ($docPaths) {
    $lastmod = CarbonImmutable::createFromTimestamp(
        collect(File::allFiles(resource_path('views/pages/docs')))
            ->max(fn ($file): int => $file->getMTime()) ?: time()
    )->toAtomString();

    $urls = collect($docPaths)->map(function (string $path) use ($lastmod) {
        $loc = e(url($path));
        $priority = $path === '/' ? '1.0' : '0.8';

        return "    <url>\n        <loc>{$loc}</loc>\n        <lastmod>{$lastmod}</lastmod>\n        <changefreq>weekly</changefreq>\n        <priority>{$priority}</priority>\n    </url>";
    })->implode("\n");

    $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n{$urls}\n</urlset>\n";

    return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
});

foreach ($docPages as $page) {
    Route::livewire($page['path'], $page['component']);
}
