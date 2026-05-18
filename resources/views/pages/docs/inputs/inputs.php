<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public ?string $lastValue = null;

    public function askName(): void
    {
        LivewireAlert::title('Enter your name')
            ->withTextInput(label: 'Full name', placeholder: 'John Doe')
            ->withConfirmButton('Submit')
            ->onConfirm('captureInput', ['field' => 'name'])
            ->show();
    }

    public function askEmail(): void
    {
        LivewireAlert::title('Your email')
            ->withEmailInput(placeholder: 'you@example.com')
            ->withConfirmButton('Submit')
            ->onConfirm('captureInput', ['field' => 'email'])
            ->show();
    }

    public function askQuantity(): void
    {
        LivewireAlert::title('Quantity')
            ->withNumberInput(placeholder: '1', value: '1')
            ->withConfirmButton('OK')
            ->onConfirm('captureInput', ['field' => 'quantity'])
            ->show();
    }

    public function askSize(): void
    {
        LivewireAlert::title('Choose a size')
            ->withSelectInput(
                options: ['s' => 'Small', 'm' => 'Medium', 'l' => 'Large'],
                label: 'Size',
                value: 'm',
            )
            ->withConfirmButton('Confirm')
            ->onConfirm('captureInput', ['field' => 'size'])
            ->show();
    }

    public function askChoice(): void
    {
        LivewireAlert::title('Pick one')
            ->withRadioInput(
                options: ['yes' => 'Yes', 'no' => 'No'],
                value: 'yes',
            )
            ->withConfirmButton('Submit')
            ->onConfirm('captureInput', ['field' => 'choice'])
            ->show();
    }

    public function askTerms(): void
    {
        LivewireAlert::title('Terms')
            ->withCheckboxInput(label: 'I agree to the terms')
            ->withConfirmButton('Continue')
            ->onConfirm('captureInput', ['field' => 'terms'])
            ->show();
    }

    public function captureInput(array $data): void
    {
        $field = $data['field'];
        $value = $data['value'] ?? null;

        $this->lastValue = "{$field}: ".($value === null ? 'null' : (string) $value);

        LivewireAlert::title('Captured')
            ->text($this->lastValue)
            ->success()
            ->asToast()
            ->show();
    }
};
