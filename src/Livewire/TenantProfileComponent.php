<?php

namespace FilamentTenant\Livewire;

use Filament\Actions\Concerns\InteractsWithActions;
use Filament\Actions\Contracts\HasActions;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Livewire\Component;

class TenantProfileComponent extends Component implements HasActions, HasForms
{
    use InteractsWithActions;
    use InteractsWithForms;

    public $sort = 0;

    public function getName()
    {
        return str(static::class)->afterLast('\\')->snake();
    }

    public function render()
    {
        return view($this->view);
    }
}
