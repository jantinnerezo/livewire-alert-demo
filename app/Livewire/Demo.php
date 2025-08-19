<?php

declare(strict_types=1);

namespace App\Livewire;

use App\Actions\HighlightCodeAction;
use App\Livewire\Concerns\HasGithubBadges;
use DanHarrin\LivewireRateLimiting\Exceptions\TooManyRequestsException;
use DanHarrin\LivewireRateLimiting\WithRateLimiting;
use Illuminate\Support\Js;
use Jantinnerezo\LivewireAlert\Enums\Icon;
use Jantinnerezo\LivewireAlert\Enums\Position;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Attributes\On;
use Livewire\Component;

class Demo extends Component
{   
    use HasGithubBadges;
    use WithRateLimiting;

    public array $options = [
        'icon' => Icon::Success->value,
        'title' => 'Hello World',
        'text' => 'This is a demo of Livewire Alert.',
        'timer' => 3000,
        'position' => Position::Center->value,
        'confirmButtonText' => 'OK',
        'cancelButtonText' => 'Cancel',
        'denyButtonText' => 'Deny',
        'confirmButtonColor' => '#00a63e',
        'cancelButtonColor' => '#414558',
        'denyButtonColor' => '#ff5555'
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
        try {
            $this->rateLimit(15);
        } catch (TooManyRequestsException $exception) {
            LivewireAlert::title('Whooa! slow down!')
                ->text('You can only show 20 alerts per minute!')
                ->error()
                ->show();
        }

        $alert = LivewireAlert::title($this->options['title'] ?? '')
            ->text($this->options['text'] ?? '')
            ->position($this->options['position'] ?? Position::TopEnd->value)
            ->timer((int) $this->options['timer']);
    
        match (Icon::from($this->options['icon'])) {
            Icon::Success => $alert->success(),
            Icon::Warning => $alert->warning(),
            Icon::Error => $alert->error(),
            Icon::Info => $alert->info(),
            Icon::Question => $alert->question(),
        };

        $this->generateCode();

        if ($this->options['showConfirmButton'] ?? false) {
            $alert->withConfirmButton($this->options['confirmButtonText']);

            $this->code .= "\n   ->withConfirmButton('{$this->options['confirmButtonText']}')";

            if (filled($this->options['confirmButtonColor'])) {
                $alert->confirmButtonColor(
                    $this->options['confirmButtonColor']
                );

                $this->code .= "\n   ->confirmButtonColor('{$this->options['confirmButtonColor']}')";
            }
        }

        if ($this->options['showCancelButton'] ?? false) {
            $alert->withCancelButton($this->options['cancelButtonText']);

            $this->code .= "\n   ->withCancelButton('{$this->options['cancelButtonText']}')";

            if (filled($this->options['cancelButtonColor'])) {
                $alert->cancelButtonColor(
                    $this->options['cancelButtonColor']
                );

                $this->code .= "\n   ->cancelButtonColor('{$this->options['cancelButtonColor']}')";
            }
        }

        if ($this->options['showDenyButton'] ?? false) {
            $alert->withDenyButton($this->options['denyButtonText']);

            $this->code .= "\n   ->withDenyButton('{$this->options['denyButtonText']}')";

            if (filled($this->options['denyButtonColor'])) {
                $alert->denyButtonColor(
                    $this->options['denyButtonColor']
                );

                $this->code .= "\n   ->denyButtonColor('{$this->options['denyButtonColor']}')";
            }
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
        "   ->timer({$this->options['timer']})";
    }

    protected function showGeneratedCode(): void
    {
        $this->code .= "\n   ->show();";

        $this->js(
            '$refs.code.innerHTML = ' . Js::from((new HighlightCodeAction())->execute($this->code)) . ';'
        );

    }

    public function render()
    {
        return view('livewire.demo');
    }
}
