<div
    x-data
    x-on:keydown.window.slash.prevent="$refs.search.focus()"
    class="relative ml-auto hidden w-72 lg:block"
>
    <label for="docs-search" class="sr-only">Search docs</label>

    <div class="flex h-10 items-center gap-3 rounded-xl border border-white/10 bg-zinc-900/70 px-4 text-sm text-zinc-500 transition focus-within:border-rose-300/25 focus-within:bg-zinc-900">
        <svg class="size-4 shrink-0 text-zinc-500" viewBox="0 0 24 24" fill="none" aria-hidden="true">
            <path d="m21 21-4.35-4.35m2.35-5.65a8 8 0 1 1-16 0 8 8 0 0 1 16 0Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
        </svg>
        <input
            id="docs-search"
            x-ref="search"
            type="search"
            wire:model.live.debounce.150ms="query"
            autocomplete="off"
            placeholder="Search docs"
            class="min-w-0 flex-1 border-0 bg-transparent p-0 text-sm text-zinc-200 placeholder:text-zinc-500 focus:outline-none focus:ring-0"
        >
        <kbd class="rounded-md border border-white/10 bg-zinc-950 px-1.5 py-0.5 text-[11px] font-medium text-zinc-500">/</kbd>
    </div>

    @if ($query !== '')
        <div class="absolute left-0 right-0 top-full z-50 mt-2 overflow-hidden rounded-xl border border-white/10 bg-zinc-950/95 shadow-2xl shadow-black/30 backdrop-blur">
            @if ($this->results)
                <div class="max-h-[24rem] overflow-y-auto p-1.5">
                    @foreach ($this->results as $result)
                        <a
                            href="{{ $result['url'] }}"
                            wire:navigate
                            class="block rounded-lg px-3 py-2.5 transition hover:bg-zinc-900"
                            wire:key="docs-search-{{ $result['url'] }}"
                        >
                            <span class="mb-1 block text-sm font-semibold text-zinc-100">{{ $result['title'] }}</span>
                            <span class="block text-xs font-medium uppercase tracking-[0.14em] text-rose-200/70">{{ $result['section'] }}</span>
                            <span class="mt-1 block text-xs leading-5 text-zinc-500">{{ $result['description'] }}</span>
                        </a>
                    @endforeach
                </div>
            @else
                <div class="px-4 py-3 text-sm text-zinc-500">
                    No docs found for "{{ $query }}".
                </div>
            @endif
        </div>
    @endif
</div>
