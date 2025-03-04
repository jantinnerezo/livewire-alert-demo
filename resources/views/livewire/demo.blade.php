<div>
    <x-nav />
 
    <div class="prose mx-auto px-3">
        @include('includes.title')

        <p class="mt-0">
            Welcome to the interactive demo for the Livewire Alert. Here, you can test and explore its functionality in real-time. Customize the alerts and see how they behave dynamically. For additional configuration options and advanced features, refer to the official <a 
                class="text-primary" 
                href="https://sweetalert2.github.io/#configuration"
            >
                <strong>SweetAlert2</strong>
            </a> documentation.
        </p>

        <div wire:loading.class="opacity-50" class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div class="col-span-2 md:col-span-1">
                @livewire('list-icons', ['icon' => $options['icon']])
            </div>
            <div class="col-span-2 md:col-span-1">
                @livewire('positions', ['position' => $options['position']])
            </div>
            <div class="col-span-2">
                @livewire('options', ['options' => $options])
            </div>

            <div class="col-span-2" wire:ignore>
                <div>
                    <fieldset class="fieldset w-full bg-base-200 border border-base-300 p-4 rounded-box">
                        <legend class="fieldset-legend">Code</legend>
                        <div x-ref="code" class="prose">
                            {!! $code !!}
                        </div>
                    </fieldset>
                </div>
            </div>
            
            <button class="btn btn-primary" wire:click="showAlert">
                Show Alert
            </button>

            <button class="btn btn-neutral" wire:click="showAlert(true)">
                Show Toast
            </button>
        </div>

        <div class="divider mt-24">👋🏼 Hello there!</div>

        <div>
            <p>
                If you'd like to contribute to this demo, suggest improvements, or report issues, feel free to submit a Pull Request (PR) or open an issue to this demo's 
                <a href="https://github.com/jantinnerezo/livewire-alert-demo/issues">
                    <strong> Github </strong>
                </a> repo.
            </p>
        </div>
    </div>

    <div class="divider mt-24"></div>

    <x-footer />
</div>