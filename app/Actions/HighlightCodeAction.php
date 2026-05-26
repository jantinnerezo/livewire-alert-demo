<?php

declare(strict_types=1);

namespace App\Actions;

use Illuminate\Support\Facades\Cache;
use Spatie\ShikiPhp\Shiki;

class HighlightCodeAction
{
    private const CACHE_VERSION = 'v1';

    private const THEME = 'catppuccin-mocha';

    public function execute(string $code, string $language = 'php'): string
    {
        $language = strtolower($language);

        return Cache::rememberForever(
            $this->cacheKey($code, $language),
            fn (): string => Shiki::highlight(
                code: $code,
                language: $language,
                theme: self::THEME,
            ),
        );
    }

    private function cacheKey(string $code, string $language): string
    {
        return 'docs:highlight:'.self::CACHE_VERSION.':'.hash('sha256', self::THEME.'|'.$language.'|'.$code);
    }
}
