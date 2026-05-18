<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public ?string $result = null;

    public function askConfirm(): void
    {
        LivewireAlert::title('Are you sure?')
            ->text('Do you want to proceed with this action?')
            ->asConfirm()
            ->show();
    }

    public function askDelete(): void
    {
        LivewireAlert::title('Delete Item')
            ->text('Are you sure you want to delete this item?')
            ->asConfirm()
            ->onConfirm('deleteItem', ['id' => 42])
            ->onDeny('keepItem', ['id' => 42])
            ->show();
    }

    public function deleteItem(array $data): void
    {
        $this->result = "Deleted item {$data['id']}";

        LivewireAlert::title('Deleted')
            ->success()
            ->asToast()
            ->show();
    }

    public function keepItem(array $data): void
    {
        $this->result = "Kept item {$data['id']}";

        LivewireAlert::title('Kept')
            ->info()
            ->asToast()
            ->show();
    }
};
