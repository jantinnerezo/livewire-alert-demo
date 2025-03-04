<div>
    <fieldset 
        class="fieldset w-full bg-base-200 border border-base-300 p-4 rounded-box"
    >
        <legend class="fieldset-legend">Options</legend>
        
        <div class="grid grid-cols-2 gap-4">
            <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                <legend class="fieldset-legend">Title</legend>
                <input type="text" wire:model.lazy="options.title" class="input w-full" />
            </fieldset>

            <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                <legend class="fieldset-legend">Timer</legend>
                <input type="number" wire:model.lazy="options.timer" class="input w-full" />
            </fieldset>

            <fieldset class="fieldset col-span-2 w-full">
                <legend class="fieldset-legend">Text</legend>
                <input type="text" wire:model.lazy="options.text" class="input w-full" />
            </fieldset>

            <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                <legend class="fieldset-legend">Confirm Button</legend>
                <label>
                    <input 
                        type="checkbox" 
                        class="toggle toggle-primary mr-1" 
                        wire:model.lazy="options.showConfirmButton"
                    />
                    Show confirm button
                </label>
                <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                    <legend class="fieldset-legend">Confirm button text</legend>
                    <div class="flex gap-2">
                        <input 
                            type="text" 
                            wire:model.lazy="options.confirmButtonText" 
                            class="input w-full"
                        />
                        <input 
                            type="color" 
                            wire:model.lazy="options.confirmButtonColor" 
                            class="input w-10 px-0.5"
                        />
                    </div>
                </fieldset>
            </fieldset>

            <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                <legend class="fieldset-legend">Cancel Button</legend>
                <label>
                    <input 
                        type="checkbox" 
                        class="toggle toggle-primary mr-1" 
                        wire:model.lazy="options.showCancelButton"
                    />
                    Show cancel button
                </label>
                <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                    <legend class="fieldset-legend">Cancel button text</legend>
                    <div class="flex gap-2">
                        <input 
                            type="text" 
                            wire:model.lazy="options.cancelButtonText" 
                            class="input w-full"
                        />
                        <input 
                            type="color" 
                            wire:model.lazy="options.cancelButtonColor" 
                            class="input w-10 px-0.5"
                        />
                    </div>
                </fieldset>
            </fieldset>

            <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                <legend class="fieldset-legend">Deny Button</legend>
                <label>
                    <input 
                        type="checkbox" 
                        class="toggle toggle-primary mr-1" 
                        wire:model.lazy="options.showDenyButton"
                    />
                    Show deny button
                </label>
                <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                    <legend class="fieldset-legend">Deny button text</legend>
                    <div class="flex gap-2">
                        <input 
                            type="text" 
                            wire:model.lazy="options.denyButtonText" 
                            class="input w-full"
                        />
                        <input 
                            type="color" 
                            wire:model.lazy="options.denyButtonColor" 
                            class="input w-10 px-0.5"
                        />
                    </div>
                </fieldset>
            </fieldset>
        </div>
    </fieldset>
</div>
