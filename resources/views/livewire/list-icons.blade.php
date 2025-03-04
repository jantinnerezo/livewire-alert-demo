<div>
    <fieldset 
        class="fieldset bg-base-200 border border-base-300 p-4 rounded-box"
    >
        <legend class="fieldset-legend">Icon</legend>
        <div class="grid grid-cols-1 gap-4">
            @foreach ($this->icons as $iconOption)
                <div class="flex">
                    <label>
                        <input 
                            type="radio" 
                            name="icon" 
                            wire:model.live="icon"
                            value="{{ $iconOption['value'] }}"
                            class="radio {{ $iconOption['color'] }}" 
                        />
                        <span class="icon">{{ $iconOption['label'] }}</span>
                    </label>
                </div>
            @endforeach
        </div>
    </fieldset>
</div>
