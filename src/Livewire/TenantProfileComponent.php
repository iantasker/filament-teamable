<?php

namespace FilamentTenant\Livewire;

use Livewire\Component;
use Filament\Forms\Contracts\HasForms;
use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;

class TenantProfileComponent extends Component implements HasForms, HasActions
{
    use InteractsWithForms, InteractsWithActions;

    public $sort = 0;

    function getName()
    {
        return str(static::class)->afterLast('\\')->snake();
    }

    public function render()
    {
        return view($this->view);
    }

}
