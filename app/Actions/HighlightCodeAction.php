<?php

declare(strict_types=1);

namespace App\Actions;

use Spatie\ShikiPhp\Shiki;

class HighlightCodeAction
{
    public function execute(string $code, string $language = 'php'): string
    {
        return Shiki::highlight(
            code: $code,
            language: $language,
            theme: 'catppuccin-mocha',
        );
    }
}
