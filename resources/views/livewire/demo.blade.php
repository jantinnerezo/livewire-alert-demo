<div>
    <x-nav />
    <article class="prose lg:prose-lg container mx-auto">
        <x-intro :badges="$badges" />
        <x-section-border />
        <x-installation />
        <x-requirements />
        <x-section-border />
        <div id="usage">
            <x-usage />
        </div>
        <x-section-border />
        <livewire:alert />
        <x-section-border />
        <livewire:confirm />
        <x-section-border />
        <x-end />
    </article>
    <x-footer />
</div>