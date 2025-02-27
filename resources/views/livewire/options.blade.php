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
                <legend class="fieldset-legend">Text</legend>
                <input type="text" wire:model.lazy="options.text" class="input w-full" />
            </fieldset>

            <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                <legend class="fieldset-legend">Timer</legend>
                <input type="number" wire:model.lazy="options.timer" class="input w-full" />
                <p class="fieldset-label mt-0 mb-0">
                    Auto close timer of the popup. Set in ms (milliseconds)
                </p>
            </fieldset>

            <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                <legend class="fieldset-legend">Confirm button text</legend>
                <input 
                    type="text" 
                    wire:model.lazy="options.confirmButtonText" 
                    class="input w-full"
                />
                <p class="fieldset-label mt-0 mb-0">
                    Use this to change the text on the "Confirm" button
                </p>
            </fieldset>

            <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                <legend class="fieldset-legend">Cancel button text</legend>
                <input 
                    type="text" 
                    wire:model.lazy="options.cancelButtonText" 
                    class="input w-full"
                />
                <p class="fieldset-label mt-0 mb-0">
                    Use this to change the text on the "Cancel" button
                </p>
            </fieldset>

            <fieldset class="fieldset col-span-2 md:col-span-1 w-full">
                <legend class="fieldset-legend">Deny button text</legend>
                <input 
                    type="text" 
                    wire:model.lazy="options.denyButtonText"
                    class="input w-full"
                />
                <p class="fieldset-label mt-0 mb-0">
                    Use this to change the text on the "Deny" button
                </p>
            </fieldset>

            <div class="grid grid-cols-1 md:grid-cols-3 col-span-2 gap-4">
                <label>
                    <input 
                        type="checkbox" 
                        class="toggle toggle-primary mr-1" 
                        wire:model.live="options.showConfirmButton"
                    />
                    Show confirm button
                </label>

                <label>
                    <input 
                        type="checkbox" 
                        class="toggle toggle-primary mr-1" 
                        wire:model.live="options.showCancelButton"
                    />
                    Show cancel button
                </label>

                <label>
                    <input 
                        type="checkbox" 
                        class="toggle toggle-primary mr-1" 
                        wire:model.live="options.showDenyButton"
                    />
                    Show deny button
                </label>
            </div>
        </div>
    </fieldset>
</div>
