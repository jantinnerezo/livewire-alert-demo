@props([
    'title' => null,
    'description' => null,
])

@php
    $sectionId = $attributes->get('id') ?? ($title ? \Illuminate\Support\Str::slug(strip_tags($title)) : null);
@endphp

<section
    @if ($sectionId) id="{{ $sectionId }}" @endif
    {{ $attributes->except('id')->merge(['class' => 'mb-14 scroll-mt-24']) }}
>
    @if ($title)
        <h2 class="mb-3 text-2xl font-bold tracking-tight text-white">{{ $title }}</h2>
    @endif

    @if ($description)
        <p class="mb-6 max-w-2xl text-[15px] leading-7 text-zinc-400">{!! $description !!}</p>
    @endif

    @isset($demo)
        <div class="mb-5 overflow-hidden rounded-xl border border-white/10 bg-zinc-900/65 shadow-[0_18px_60px_rgba(0,0,0,0.18)]">
            <div class="flex items-center justify-between border-b border-white/10 bg-zinc-950/50 px-4 py-2.5">
                <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-[0.14em] text-amber-200">
                    <span class="size-2 rounded-full bg-amber-300"></span>
                    Live demo
                </div>
                <span class="text-xs font-medium text-zinc-600">SweetAlert2</span>
            </div>
            <div class="flex flex-wrap items-center gap-2 p-5">
                {{ $demo }}
            </div>
        </div>
    @endisset

    @isset($code)
        <div class="overflow-hidden rounded-xl border border-white/10 bg-[#17151c] text-sm shadow-[0_18px_60px_rgba(0,0,0,0.18)]">
            <div class="flex items-center justify-between border-b border-white/10 bg-zinc-950/50 px-4 py-2.5">
                <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-[0.14em] text-rose-200">
                    <span class="size-2 rounded-full bg-rose-300"></span>
                    PHP
                </div>
                <span class="font-mono text-[11px] text-zinc-600">LivewireAlert</span>
            </div>
            <div class="overflow-x-auto p-4 text-[13px] leading-6 [&_pre]:!m-0 [&_pre]:!bg-transparent [&_pre]:!p-0">
                {!! app(\App\Actions\HighlightCodeAction::class)->execute(trim($code)) !!}
            </div>
        </div>
    @endisset

    <div class="[&_a]:font-medium [&_a]:text-rose-200 [&_a:hover]:text-rose-100 [&_code]:rounded [&_code]:bg-zinc-900 [&_code]:px-1.5 [&_code]:py-0.5 [&_code]:text-xs [&_code]:text-zinc-200">
        {{ $slot }}
    </div>
</section>
