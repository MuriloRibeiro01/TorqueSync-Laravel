<?php

namespace App\View\Components\Veiculo;

use Closure;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class AdicionarModal extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.veiculo.adicionar-modal');
    }
}
