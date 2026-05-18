@section('title', 'Installation')

<div>
    <div class="mb-12">
        <h1 class="mb-5 text-[42px] font-extrabold leading-tight text-white">Installation</h1>
        <p class="max-w-[760px] text-xl leading-9 text-slate-400">
            Requires PHP 8.1+, Laravel 10+, Livewire 3.x or 4.x, and SweetAlert2.
        </p>
    </div>

    <x-docs.section title="Install the package" description="Pull it in via Composer.">
        <x-slot:code>
composer require jantinnerezo/livewire-alert
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Publish the config (optional)" description="Only needed if you want to override defaults like position or button text.">
        <x-slot:code>
php artisan vendor:publish --tag=livewire-alert:config
        </x-slot:code>
    </x-docs.section>

    <x-docs.section title="Install SweetAlert2 via npm" description="Recommended for Vite-based projects.">
        <div class="overflow-hidden rounded-lg border border-white/[0.04] bg-[#202a3d] text-sm shadow-[0_16px_40px_rgba(0,0,0,0.12)]">
            <div class="border-b border-white/[0.04] bg-[#1b2435] px-5 py-2 text-xs font-bold uppercase tracking-wide text-slate-500">Shell</div>
            <pre class="overflow-x-auto p-5 text-[15px] leading-7 text-slate-300"><code>npm install sweetalert2</code></pre>
        </div>

        <p class="mt-6 mb-3 text-[15px] leading-7 text-slate-400">Then import it in <code class="rounded bg-[#202a3d] px-1.5 py-0.5 text-xs text-slate-200">resources/js/app.js</code>:</p>

        <div class="overflow-hidden rounded-lg border border-white/[0.04] bg-[#202a3d] text-sm shadow-[0_16px_40px_rgba(0,0,0,0.12)]">
            <div class="border-b border-white/[0.04] bg-[#1b2435] px-5 py-2 text-xs font-bold uppercase tracking-wide text-slate-500">JavaScript</div>
            <pre class="overflow-x-auto p-5 text-[15px] leading-7 text-slate-300"><code>import Swal from 'sweetalert2'

window.Swal = Swal</code></pre>
        </div>
    </x-docs.section>

    <x-docs.section title="Or via CDN" description="Drop a script tag into your Blade layout if you prefer not to bundle it.">
        <div class="overflow-hidden rounded-lg border border-white/[0.04] bg-[#202a3d] text-sm shadow-[0_16px_40px_rgba(0,0,0,0.12)]">
            <div class="border-b border-white/[0.04] bg-[#1b2435] px-5 py-2 text-xs font-bold uppercase tracking-wide text-slate-500">HTML</div>
            <pre class="overflow-x-auto p-5 text-[15px] leading-7 text-slate-300"><code>&lt;body&gt;
    &lt;script src=&quot;https://cdn.jsdelivr.net/npm/sweetalert2@11&quot;&gt;&lt;/script&gt;
&lt;/body&gt;</code></pre>
        </div>
    </x-docs.section>

    <x-docs.section title="Filament" description="Register SweetAlert2 as a Filament asset in your AppServiceProvider boot method.">
        <x-slot:code>
use Filament\Support\Facades\FilamentAsset;
use Illuminate\Support\Facades\Vite;
use Filament\Support\Assets\Js;

public function boot()
{
    FilamentAsset::register([
        Js::make('sweetalert2', Vite::asset('resources/js/sweetalert2.js')),
        // Or via CDN:
        // Js::make('sweetalert2', 'https://cdn.jsdelivr.net/npm/sweetalert2@11'),
    ]);
}
        </x-slot:code>
    </x-docs.section>

    <div class="mt-2 rounded-lg border border-white/[0.06] bg-[#202a3d]/70 p-5 text-sm text-slate-400">
        Next: <a href="/basic-usage" wire:navigate class="text-white underline decoration-slate-600 underline-offset-4 hover:text-pink-300">Basic usage</a> →
    </div>
</div>
