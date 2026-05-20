<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Route;

$docPaths = [
    '/',
    '/installation',
    '/basic-usage',
    '/toasts',
    '/timers',
    '/buttons',
    '/button-events',
    '/confirm',
    '/inputs',
    '/loading',
    '/updating',
    '/flash',
    '/customization',
    '/dependency-injection',
    '/ai-skill',
];

Route::get('/sitemap.xml', function () use ($docPaths) {
    $lastmod = now()->toAtomString();

    $urls = collect($docPaths)->map(function (string $path) use ($lastmod) {
        $loc = e(url($path));
        $priority = $path === '/' ? '1.0' : '0.8';

        return "    <url>\n        <loc>{$loc}</loc>\n        <lastmod>{$lastmod}</lastmod>\n        <changefreq>weekly</changefreq>\n        <priority>{$priority}</priority>\n    </url>";
    })->implode("\n");

    $xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n<urlset xmlns=\"http://www.sitemaps.org/schemas/sitemap/0.9\">\n{$urls}\n</urlset>\n";

    return Response::make($xml, 200, ['Content-Type' => 'application/xml']);
});

Route::livewire('/', 'pages::docs.home');

Route::livewire('/installation', 'pages::docs.installation');
Route::livewire('/basic-usage', 'pages::docs.basic-usage');
Route::livewire('/toasts', 'pages::docs.toasts');
Route::livewire('/timers', 'pages::docs.timers');
Route::livewire('/buttons', 'pages::docs.buttons');
Route::livewire('/button-events', 'pages::docs.button-events');
Route::livewire('/confirm', 'pages::docs.confirm');
Route::livewire('/inputs', 'pages::docs.inputs');
Route::livewire('/loading', 'pages::docs.loading');
Route::livewire('/updating', 'pages::docs.updating');
Route::livewire('/flash', 'pages::docs.flash');
Route::livewire('/customization', 'pages::docs.customization');
Route::livewire('/dependency-injection', 'pages::docs.dependency-injection');
Route::livewire('/ai-skill', 'pages::docs.ai-skill');
