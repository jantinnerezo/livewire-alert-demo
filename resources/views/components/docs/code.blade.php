@props([
    'language' => 'php',
])

@php
    $labelMap = [
        'php' => 'PHP',
        'shell' => 'Shell',
        'bash' => 'Shell',
        'sh' => 'Shell',
        'js' => 'JavaScript',
        'javascript' => 'JavaScript',
        'ts' => 'TypeScript',
        'typescript' => 'TypeScript',
        'html' => 'HTML',
        'css' => 'CSS',
        'json' => 'JSON',
        'blade' => 'Blade',
    ];
    $label = $labelMap[strtolower($language)] ?? strtoupper($language);
@endphp

<div {{ $attributes->merge(['class' => 'overflow-hidden rounded-xl border border-white/10 bg-[#17151c] text-sm shadow-[0_18px_60px_rgba(0,0,0,0.18)]']) }}>
    <div class="flex items-center justify-between border-b border-white/10 bg-zinc-950/50 px-4 py-2.5">
        <div class="flex items-center gap-2 text-xs font-bold uppercase tracking-[0.14em] text-rose-200">
            <span class="size-2 rounded-full bg-rose-300"></span>
            {{ $label }}
        </div>
        <span class="font-mono text-[11px] text-zinc-600">LivewireAlert</span>
    </div>
    <div class="overflow-x-auto p-4 text-[13px] leading-6 [&_pre]:!m-0 [&_pre]:!bg-transparent [&_pre]:!p-0">
        {!! app(\App\Actions\HighlightCodeAction::class)->execute(trim($slot), $language) !!}
    </div>
</div>
