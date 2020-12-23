<div>
    <h3 class="my-0"> Displaying alert </h3>
    <p> You can play around with SweetAlert2 configuration. </p>
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        <div>
            <input type="text" wire:model="message" placeholder="Enter alert message" class="rounded-md border-cool-gray-200 shadow-sm w-full">
        </div>
        <div>
            <input type="text" wire:model="text" placeholder="Enter text message" class="rounded-md border-cool-gray-200 shadow-sm w-full">
        </div>
        <div>
            <select wire:model="config.position" class="rounded-md border-cool-gray-200 shadow-sm w-full">
                @foreach ($positions as $position)
                    <option value="{{ $position }}"> {{ $position}} </option>
                @endforeach
            </select>
        </div>
        <div>
            <input type="text" wire:model="config.timer" placeholder="Enter duration" class="rounded-md border-cool-gray-200 shadow-sm w-full">
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
        <div class="col-span-1 sm:col-span-2">
            <button type="button" class="w-full" wire:click="showAlert"> Display Alert </button>
        </div>
    </div>
</div>
