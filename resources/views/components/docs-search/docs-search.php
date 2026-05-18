<?php

declare(strict_types=1);

use Livewire\Attributes\Computed;
use Livewire\Component;

new class extends Component
{
    public string $query = '';

    #[Computed]
    public function results(): array
    {
        $query = str($this->query)->squish()->lower()->toString();

        if ($query === '') {
            return [];
        }

        return collect($this->items())
            ->map(function (array $item) use ($query): array {
                $haystack = str(implode(' ', [
                    $item['title'],
                    $item['section'],
                    $item['description'],
                    $item['keywords'],
                ]))->lower()->toString();

                $item['score'] = $this->score($query, $item, $haystack);

                return $item;
            })
            ->filter(fn (array $item): bool => $item['score'] > 0)
            ->sortByDesc('score')
            ->take(8)
            ->values()
            ->all();
    }

    private function score(string $query, array $item, string $haystack): int
    {
        $title = str($item['title'])->lower()->toString();
        $section = str($item['section'])->lower()->toString();

        if ($title === $query) {
            return 100;
        }

        if (str_starts_with($title, $query)) {
            return 80;
        }

        if (str_contains($title, $query)) {
            return 60;
        }

        if (str_contains($section, $query)) {
            return 35;
        }

        return str_contains($haystack, $query) ? 20 : 0;
    }

    private function items(): array
    {
        return [
            [
                'title' => 'Overview',
                'section' => 'Getting Started',
                'url' => '/',
                'description' => 'Current Livewire Alert documentation overview.',
                'keywords' => 'home quickstart version docs',
            ],
            [
                'title' => 'Installation',
                'section' => 'Getting Started',
                'url' => '/installation',
                'description' => 'Install the package, publish config, register SweetAlert2, CDN, and Filament setup.',
                'keywords' => 'composer npm yarn sweetalert2 cdn filament config vendor publish',
            ],
            [
                'title' => 'Basic Usage',
                'section' => 'Getting Started',
                'url' => '/basic-usage',
                'description' => 'Create alerts with title, text, icons, and positions.',
                'keywords' => 'title text success error warning info question position show',
            ],
            [
                'title' => 'Toast Notifications',
                'section' => 'Core Patterns',
                'url' => '/toasts',
                'description' => 'Use asToast or configure toast behavior manually.',
                'keywords' => 'toast asToast timer progress position top end',
            ],
            [
                'title' => 'Timers',
                'section' => 'Core Patterns',
                'url' => '/timers',
                'description' => 'Configure auto-dismiss timers, progress bars, and persistent alerts.',
                'keywords' => 'timer timerProgressBar duration milliseconds disable null',
            ],
            [
                'title' => 'Buttons',
                'section' => 'Core Patterns',
                'url' => '/buttons',
                'description' => 'Add confirm, cancel, and deny buttons with custom text and colors.',
                'keywords' => 'withConfirmButton withCancelButton withDenyButton confirmButtonText colors',
            ],
            [
                'title' => 'Button Events',
                'section' => 'Core Patterns',
                'url' => '/button-events',
                'description' => 'Map confirm, dismiss, and deny actions back to Livewire methods.',
                'keywords' => 'onConfirm onDismiss onDeny event handler callback data',
            ],
            [
                'title' => 'Confirm Dialog',
                'section' => 'Core Patterns',
                'url' => '/confirm',
                'description' => 'Use asConfirm for decisions that need explicit user action.',
                'keywords' => 'asConfirm question confirm deny cancel destructive',
            ],
            [
                'title' => 'Inputs',
                'section' => 'Core Patterns',
                'url' => '/inputs',
                'description' => 'Collect text, email, number, select, radio, checkbox, and file input values.',
                'keywords' => 'input text email number select radio checkbox file value onConfirm',
            ],
            [
                'title' => 'Loading States',
                'section' => 'Advanced',
                'url' => '/loading',
                'description' => 'Show non-dismissable loading alerts and close them after long-running actions.',
                'keywords' => 'asLoading close spinner processing uploading lifecycle',
            ],
            [
                'title' => 'Updating Alerts',
                'section' => 'Advanced',
                'url' => '/updating',
                'description' => 'Mutate an open alert in place with update, polling, and job batch examples.',
                'keywords' => 'update Swal.update wire poll progress batch Bus loading',
            ],
            [
                'title' => 'Flash Alerts',
                'section' => 'Advanced',
                'url' => '/flash',
                'description' => 'Show alerts after redirects by reading flash data from the session.',
                'keywords' => 'flash session redirect mount saved',
            ],
            [
                'title' => 'Customization',
                'section' => 'Advanced',
                'url' => '/customization',
                'description' => 'Customize images, CSS classes, button order, and raw SweetAlert2 options.',
                'keywords' => 'imageUrl imageWidth imageHeight customClass reverseButtons withOptions',
            ],
            [
                'title' => 'Dependency Injection',
                'section' => 'Advanced',
                'url' => '/dependency-injection',
                'description' => 'Type-hint the LivewireAlert service instead of using the facade.',
                'keywords' => 'dependency injection type hint facade service',
            ],
        ];
    }
};
