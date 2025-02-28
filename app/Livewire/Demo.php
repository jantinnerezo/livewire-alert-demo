<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Actions\HighlightCodeAction;
use App\Livewire\Concerns\HasGithubBadges;
use Jantinnerezo\LivewireAlert\Enums\Icon;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Demo extends Component
{   
    use HasGithubBadges;

    public array $options = [
        'icon' => Icon::Success->value,
        'title' => 'Hello World',
        'text' => 'This is a demo of Livewire Alert.',
        'timer' => 3000,
        'position' => Position::TopEnd->value,
        'confirmButtonText' => 'OK',
        'cancelButtonText' => 'Cancel',
        'denyButtonText' => 'Deny',
    ]; 

    public string $code = '';

    public function mount(HighlightCodeAction $action): void
    {
        $this->code = $action->execute(
            '/* Hit show alert or toast to generate code */'
        );
    }

    #[On('updateOptions')]
    public function updateOptions($options): void
    {
        $this->options = array_merge($this->options, $options);
    }

    public function showAlert(bool $toast = false): void
    {
        $alert = LivewireAlert::title($this->options['title'] ?? '')
            ->text($this->options['text'] ?? '')
            ->position($this->options['position'] ?? Position::TopEnd->value)
            ->timer((int) $this->options['timer'] ?? null)
            ->confirmButtonText($this->options['confirmButtonText'] ?? '')
            ->cancelButtonText($this->options['cancelButtonText'] ?? '')
            ->denyButtonText($this->options['denyButtonText'] ?? '');
    
        match (Icon::from($this->options['icon'])) {
            Icon::Success => $alert->success(),
            Icon::Warning => $alert->warning(),
            Icon::Error => $alert->error(),
            Icon::Info => $alert->info(),
            Icon::Question => $alert->question(),
        };

        $this->generateCode();

        if ($this->options['showConfirmButton'] ?? false) {
            $alert->withConfirmButton();
            $this->code .= "\n   ->withConfirmButton()";
        }

        if ($this->options['showCancelButton'] ?? false) {
            $alert->withCancelButton();
            $this->code .= "\n   ->withCancelButton()";
        }

        if ($this->options['showDenyButton'] ?? false) {
            $alert->withDenyButton();
            $this->code .= "\n   ->withDenyButton()";
        }

        if ($toast) {
            $alert->toast();
            $this->code .= "\n   ->toast()";
        }

        $alert->show();

        $this->showGeneratedCode();
    }

    protected function generateCode(): void
    {
        $this->code = "LivewireAlert::title('{$this->options['title']}')\n" .
        "   ->text('{$this->options['text']}')\n" .
        "   ->position('{$this->options['position']}')\n" .
        "   ->timer({$this->options['timer']})\n" .
        "   ->confirmButtonText('{$this->options['confirmButtonText']}')\n" .
        "   ->cancelButtonText('{$this->options['cancelButtonText']}')\n" .
        "   ->denyButtonText('{$this->options['denyButtonText']}')";
    }

    protected function showGeneratedCode(): void
    {
        $this->code .= "\n   ->show();";

        $this->js(
            '$refs.code.innerHTML = `' . new HighlightCodeAction()->execute($this->code) . '`;'
        );
    }

    public function render()
    {
        return view('livewire.demo');
    }
}
