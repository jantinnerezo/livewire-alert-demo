@section('title', 'AI Skill')

@php
    $skill = <<<'MD'
---
name: livewire-alert
description: Fluent SweetAlert2 alerts, toasts, confirms, inputs, and loading dialogs for Laravel Livewire 3.x/4.x. Use when working with the jantinnerezo/livewire-alert package or when a user wants SweetAlert2 notifications from Livewire components.
---

# livewire-alert

Fluent PHP API for SweetAlert2 inside Laravel Livewire components. Package: `jantinnerezo/livewire-alert`. Requires PHP 8.1+, Laravel 10+, Livewire 3.x or 4.x, SweetAlert2.

## Install

```bash
composer require jantinnerezo/livewire-alert
npm install sweetalert2
```

Register SweetAlert2 in `resources/js/app.js`:

```js
import Swal from 'sweetalert2'
window.Swal = Swal
```

Optional config publish:

```bash
php artisan vendor:publish --tag=livewire-alert:config
```

## Core API

Use the facade or inject `Jantinnerezo\LivewireAlert\LivewireAlert`. Every builder chain ends with `->show()` (exceptions: `update()`, `close()`).

```php
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

LivewireAlert::title('Saved')->success()->show();
```

### Icons

`success()`, `error()`, `warning()`, `info()`, `question()`.

### Text and position

```php
LivewireAlert::title('Item Saved')
    ->text('Stored in the database.')
    ->success()
    ->position('center') // top-start, top-end, center, bottom-start, bottom-end
    ->show();
```

`Position` enum: `Jantinnerezo\LivewireAlert\Enums\Position`. Strings accepted too.

### Toast

`asToast()` preset (top-end, timer, progress bar) or manual `toast()`:

```php
LivewireAlert::title('Saved!')->success()->asToast()->show();

LivewireAlert::title('Welcome')
    ->info()
    ->toast()
    ->position('top-end')
    ->timer(3000)
    ->timerProgressBar()
    ->show();
```

### Timer

```php
LivewireAlert::title('Done')->success()->timer(3000)->timerProgressBar()->show();
LivewireAlert::title('Review')->warning()->timer(null)->withConfirmButton('OK')->show();
```

`timer(null)` disables auto-dismiss.

### Buttons

```php
LivewireAlert::title('Save?')
    ->withConfirmButton('Save')
    ->withCancelButton('Cancel')
    ->withDenyButton('Discard')
    ->confirmButtonColor('#16a34a')
    ->denyButtonColor('#dc2626')
    ->show();
```

Text helpers: `confirmButtonText()`, `cancelButtonText()`, `denyButtonText()`. Color helpers accept any CSS color.

### Confirm dialog

`asConfirm()` = question icon + confirm/deny buttons + no timer.

```php
LivewireAlert::title('Delete?')
    ->text('Are you sure?')
    ->asConfirm()
    ->onConfirm('deleteItem', ['id' => $this->itemId])
    ->onDeny('keepItem', ['id' => $this->itemId])
    ->show();
```

### Button events

Map button results to Livewire methods. Payload arrives as `array $data`.

- `onConfirm($method, $payload)` — confirm button
- `onDeny($method, $payload)` — deny button
- `onDismiss($method, $payload)` — cancel, ESC, backdrop, close

```php
public function deleteItem(array $data)
{
    $id = $data['id'];
}
```

### Inputs

Input value arrives as `$data['value']` in the handler.

```php
LivewireAlert::title('Name')
    ->withTextInput(label: 'Full name', placeholder: 'John Doe')
    ->withConfirmButton('Submit')
    ->onConfirm('saveName')
    ->show();
```

Helpers: `withTextInput`, `withEmailInput`, `withPasswordInput`, `withNumberInput`, `withTextareaInput`, `withSelectInput(options: ['k' => 'Label'])`, `withRadioInput`, `withCheckboxInput` (returns `1` or `null`), `withFileInput`.

### Loading

Non-dismissable spinner. Pair with `close()` when work finishes.

```php
LivewireAlert::title('Saving...')->asLoading()->show();
// long work
LivewireAlert::close();
```

Custom title: `LivewireAlert::asLoading('Uploading...')->show();`

### Update open alert

Mutates the visible alert in place (`Swal.update()`). No flicker. No-op (console warning) if no alert is open. Does not preserve input values or rebind handlers.

```php
LivewireAlert::title('New title')->text('Updated body')->update();

LivewireAlert::update([
    'title' => 'Done',
    'icon' => 'success',
]);
```

Pair with `wire:poll` or `Bus::batch()` for live progress.

### Flash (post-redirect)

```php
// component A
session()->flash('saved', ['title' => 'Saved!', 'text' => 'Done.']);
$this->redirect('/dashboard');

// component B mount()
public function mount()
{
    if (session()->has('saved')) {
        LivewireAlert::title(session('saved.title'))
            ->text(session('saved.text'))
            ->success()
            ->show();
    }
}
```

### Customization

- `imageUrl()`, `imageWidth()`, `imageHeight()`, `imageAlt()`
- `customClass(['popup' => '...', 'confirmButton' => '...'])`
- `reverseButtons()`
- `withOptions([...])` — any raw SweetAlert2 option

```php
LivewireAlert::title('Custom')
    ->success()
    ->withOptions([
        'width' => '400px',
        'background' => '#18181b',
        'allowOutsideClick' => false,
    ])
    ->show();
```

### Dependency injection

```php
use Jantinnerezo\LivewireAlert\LivewireAlert;

public function save(LivewireAlert $alert)
{
    $alert->title('Saved')->success()->show();
}
```

Same fluent API as the facade.

### Filament

In `AppServiceProvider::boot()`:

```php
use Filament\Support\Facades\FilamentAsset;
use Filament\Support\Assets\Js;
use Illuminate\Support\Facades\Vite;

FilamentAsset::register([
    Js::make('sweetalert2', Vite::asset('resources/js/sweetalert2.js')),
]);
```

## Gotchas

- `show()` is required. Builder methods alone do nothing.
- `update()` only swaps visual options — inputs and `didOpen` callbacks are not re-applied.
- Button event handlers run server-side via Livewire. The alert stays open until the request returns.
- `Position` enum is at `Jantinnerezo\LivewireAlert\Enums\Position`. String values also work.
- Flash alerts must be read in `mount()` of the destination component.

## Links

- Repo: https://github.com/jantinnerezo/livewire-alert
- SweetAlert2 options: https://sweetalert2.github.io/#configuration
MD;
@endphp

<div>
    <div class="mb-12">
        <p class="mb-3 text-sm font-semibold uppercase tracking-[0.18em] text-amber-200">For AI Assistants</p>
        <h1 class="mb-5 text-[42px] font-extrabold leading-tight text-white">AI Skill</h1>
        <p class="max-w-[760px] text-xl leading-9 text-slate-400">
            Copy the skill below and paste it into Claude, Cursor, or any AI coding assistant. It teaches the assistant the full Livewire Alert API in one shot — no extra docs lookup required.
        </p>
    </div>

    <div
        x-data="{
            copied: false,
            copy() {
                navigator.clipboard.writeText(this.$refs.skill.textContent.trim()).then(() => {
                    this.copied = true;
                    clearTimeout(this._t);
                    this._t = setTimeout(() => (this.copied = false), 2000);
                });
            },
        }"
        class="mb-10"
    >
        <div class="mb-5 flex flex-wrap items-center justify-between gap-3 rounded-xl border border-rose-300/20 bg-rose-400/[0.06] px-5 py-4">
            <div>
                <p class="text-sm font-semibold text-white">livewire-alert.skill.md</p>
                <p class="mt-0.5 text-xs text-zinc-400">
                    Save as <code class="rounded bg-zinc-900 px-1.5 py-0.5 text-[11px] text-rose-200">.claude/skills/livewire-alert/SKILL.md</code> or paste straight into chat.
                </p>
            </div>
            <button
                type="button"
                @click="copy()"
                class="inline-flex items-center gap-2 rounded-lg bg-rose-400/15 px-4 py-2 text-sm font-semibold text-rose-100 ring-1 ring-rose-300/30 transition hover:bg-rose-400/25 hover:text-white"
            >
                <svg class="size-4" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                    <rect x="9" y="9" width="13" height="13" rx="2" ry="2"></rect>
                    <path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"></path>
                </svg>
                <span x-text="copied ? 'Copied!' : 'Copy AI Skill'"></span>
            </button>
        </div>

        <div class="overflow-hidden rounded-xl border border-white/10 bg-[#17151c] shadow-[0_18px_60px_rgba(0,0,0,0.18)]">
            <div class="flex items-center justify-between border-b border-white/10 bg-zinc-950/50 px-4 py-2.5">
                <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-[0.14em] text-rose-200">
                    <span class="size-2 rounded-full bg-rose-300"></span>
                    Markdown
                </div>
                <span class="font-mono text-[11px] text-zinc-600">SKILL.md</span>
            </div>
            <pre
                x-ref="skill"
                class="max-h-[640px] overflow-auto p-5 text-[12.5px] leading-6 text-slate-300"
            >{{ trim($skill) }}</pre>
        </div>
    </div>

    <section id="how-to-use" class="mb-14 scroll-mt-24">
        <h2 class="mb-3 text-2xl font-bold tracking-tight text-white">How to use it</h2>
        <p class="mb-6 max-w-2xl text-[15px] leading-7 text-zinc-400">
            The format is portable. Three common workflows:
        </p>

        <ul class="space-y-3 text-[15px] leading-7 text-slate-300">
            <li>
                <strong class="text-white">Claude Code / Claude Desktop:</strong>
                save the file at <code class="rounded bg-zinc-900 px-1.5 py-0.5 text-xs text-rose-200">.claude/skills/livewire-alert/SKILL.md</code> in your project. Claude loads it automatically when relevant.
            </li>
            <li>
                <strong class="text-white">Cursor / Windsurf / Copilot:</strong>
                drop the contents into a project rules or context file (<code class="rounded bg-zinc-900 px-1.5 py-0.5 text-xs text-rose-200">.cursorrules</code>, <code class="rounded bg-zinc-900 px-1.5 py-0.5 text-xs text-rose-200">.windsurfrules</code>, etc.).
            </li>
            <li>
                <strong class="text-white">One-off prompt:</strong>
                paste it directly into a chat before asking the assistant to write Livewire Alert code.
            </li>
        </ul>
    </section>

    <div class="mt-2 rounded-lg border border-white/[0.06] bg-[#202a3d]/70 p-5 text-sm leading-7 text-slate-400">
        Found a missing pattern? <a href="https://github.com/jantinnerezo/livewire-alert/issues" target="_blank" rel="noopener" class="text-white underline decoration-slate-600 underline-offset-4 hover:text-pink-300">Open an issue</a> so the skill stays accurate.
    </div>
</div>
