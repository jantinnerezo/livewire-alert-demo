<div>
    <h2 class="my-0"> Displaying alerts </h2>
    <p> You can play around with SweetAlert2 configuration. </p>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div class="col-span-1 sm:col-span-2 grid grid-cols-2 sm:grid-cols-4 gap-4">
            @foreach ($statuses as $statusValue)
                <div class="bg-white px-3 py-2 rounded-lg shadow-sm border border-cool-gray-200">
                    <x-ui::input.label class="flex items-center space-x-2">
                        <x-ui::input.radio
                            name="status"
                            wire:model="status"
                            value="{{ $statusValue }}"
                        />
                        <x-ui::input.label :value="ucwords($statusValue)" />
                    </x-ui::input.label>
                </div>
            @endforeach
        </div>
        <div>
            <input type="text" wire:model="message" placeholder="Enter  Title" class="rounded-md border-cool-gray-200 shadow-sm w-full">
        </div>
        <div>
            <input type="text" wire:model="config.text" placeholder="Enter Sub-text" class="rounded-md border-cool-gray-200 shadow-sm w-full">
        </div>
        <div>
            <input type="text" wire:model="config.confirmButtonText" placeholder="Set confirm / ok button text" class="rounded-md border-cool-gray-200 shadow-sm w-full">
        </div>
        <div>
            <input type="text" wire:model="config.cancelButtonText" placeholder="Set cancel / no button text" class="rounded-md border-cool-gray-200 shadow-sm w-full">
        </div>
        <div>
            <select wire:model="config.position" class="rounded-md border-cool-gray-200 shadow-sm w-full">
                @foreach ($positions as $position)
                    <option value="{{ $position }}"> {{ $position}} </option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="number" wire:model="config.timer" placeholder="Enter duration" class="rounded-md border-cool-gray-200 shadow-sm w-full">
        </div>
        <div class="col-span-1 sm:col-span-2">
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="bg-white px-3 py-2 rounded-lg shadow-sm border border-cool-gray-200">
                    <x-ui::input.label class="flex items-center space-x-2">
                        <x-ui::input.checkbox wire:model="config.toast" class="rounded-lg" />
                        <x-ui::input.label value="Toast" />
                    </x-ui::input.label>
                </div>
               <div class="bg-white px-3 py-2 rounded-lg shadow-sm border border-cool-gray-200">
                    <x-ui::input.label class="flex items-center space-x-2">
                        <x-ui::input.checkbox wire:model="config.showCancelButton" class="rounded-lg" />
                        <x-ui::input.label value="Show cancel button?" />
                    </x-ui::input.label>
                </div>
                <div class="bg-white px-3 py-2 rounded-lg shadow-sm border border-cool-gray-200">
                    <x-ui::input.label class="flex items-center space-x-2">
                        <x-ui::input.checkbox wire:model="config.showConfirmButton" class="rounded-lg" />
                        <x-ui::input.label value="Show confirm button?" />
                    </x-ui::input.label>
                </div>
                <div class="bg-white px-3 py-2 rounded-lg shadow-sm border border-cool-gray-200">
                    <x-ui::input.label class="flex items-center space-x-2">
                        <x-ui::input.checkbox wire:model="flash" class="rounded-lg" />
                        <x-ui::input.label value="Show as flash" />
                    </x-ui::input.label>
                </div>
            </div>
        </div>
        <div class="col-span-1 sm:col-span-2" wire:loading.class.delay="opacity-50">
            <div class="border-l-4 border-light-blue-600 font-medium pl-4 text-cool-gray-500 text-sm mt-4">
                Paste this generated code to your livewire component.
            </div>
            <pre class="scrollbar-none mt-4 language-php"><code class="scrolling-touch  language-html"><span class="text-emerald-400">$this</span>-><span class="text-emerald-400">{{ $flash ? 'flash' : 'alert' }}</span>(<span class="text-amber-400">'{{ $status }}'</span>, <span class="text-amber-400">'{{ $message }}'</span>, <span>[
@foreach ($config as $key => $value)
     <span class="text-amber-400"> '{{ $key }}'<span class="text-white"> => </span>@if (is_int($value)) <span class="text-white">{{ $value }},</span> @else @if (is_bool($value))<span class="text-white">{{ $value ? 'true' : 'false' }}</span>@else<span class="text-amber-400">'{{ $value }}'</span>@endif<span class="text-white">,</span>@endif </span>
@endforeach
]);</span>
@if ($flash)

<span class="text-cool-gray-500">// Don't forget to add redirect when using flash</span>
<span class="text-cool-gray-500">// return redirect()->to('/') @endif</span></code></pre>
        </div>
        <div class="col-span-1 sm:col-span-2">
            <button type="button" class="w-full bg-light-blue-700 rounded-lg py-3 px-4 text-light-blue-50 font-semibold" wire:click="showAlert"> Show Alert </button>
        </div>
    </div>
</div>
