<div>
    <fieldset 
        class="fieldset bg-base-200 border border-base-300 p-4 rounded-box"
    >
        <legend class="fieldset-legend">Position</legend>
        <div class="grid grid-cols-2 gap-4">
            @foreach ($this->positions as $position)
                <div class="flex">
                    <label>
                        <input 
                            type="radio" 
                            name="position" 
                            wire:model.live="position"
                            value="{{ $position['value'] }}"
                            class="radio radio-primary" 
                            checked="checked" 
                        />
                        <span class="icon">{{ $position['label'] }}</span>
                    </label>
                </div>
            @endforeach
        </div>
    </fieldset>
</div>
