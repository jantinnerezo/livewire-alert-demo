<?php

declare(strict_types=1);

use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\Layout;
use Livewire\Component;

new #[Layout('layouts::docs')] class extends Component
{
    public ?string $lastAction = null;

    public function askConfirm(): void
    {
        LivewireAlert::title('Save?')
            ->withConfirmButton('Save')
            ->onConfirm('saveData', ['id' => 42])
            ->show();
    }

    public function askDismiss(): void
    {
        LivewireAlert::title('Delete?')
            ->withConfirmButton('Delete')
            ->withCancelButton('Keep')
            ->onDismiss('cancelDelete', ['id' => 42])
            ->show();
    }

    public function askDeny(): void
    {
        LivewireAlert::title('Update?')
            ->withConfirmButton('Update')
            ->withDenyButton('Discard')
            ->onDeny('discardChanges', ['id' => 42])
            ->show();
    }

    public function askTogether(): void
    {
        LivewireAlert::title('Process File')
            ->text('What would you like to do?')
            ->question()
            ->withConfirmButton('Save')
            ->withCancelButton('Cancel')
            ->withDenyButton('Delete')
            ->onConfirm('saveFile', ['id' => 42])
            ->onDeny('deleteFile', ['id' => 42])
            ->onDismiss('cancelAction', ['id' => 42])
            ->show();
    }

    public function saveData(array $data): void
    {
        $this->recordAction('Confirmed save', $data);
    }

    public function cancelDelete(array $data): void
    {
        $this->recordAction('Dismissed delete', $data);
    }

    public function discardChanges(array $data): void
    {
        $this->recordAction('Denied update', $data);
    }

    public function saveFile(array $data): void
    {
        $this->recordAction('Saved file', $data);
    }

    public function deleteFile(array $data): void
    {
        $this->recordAction('Deleted file', $data);
    }

    public function cancelAction(array $data): void
    {
        $this->recordAction('Cancelled action', $data);
    }

    private function recordAction(string $action, array $data): void
    {
        $this->lastAction = "{$action} for ID {$data['id']}";

        LivewireAlert::title($action)
            ->text("Received ID {$data['id']}")
            ->success()
            ->asToast()
            ->show();
    }
};
