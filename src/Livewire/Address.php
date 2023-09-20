<?php

namespace FilamentTenant\Livewire;

use Filament\Facades\Filament;
use Filament\Forms;

class Address extends MyProfileComponent
{
    protected string $view = 'filament-tenant::livewire.address';

    public $panel;

    public $tenant;

    public function mount()
    {
        $this->panel = Filament::getCurrentPanel();
        $this->tenant = Filament::getTenant();
        $this->form->fill($this->tenant);
    }

    protected function getProfileFormSchema()
    {
        return Forms\Components\Group::make([
            Forms\Components\TextInput::make('billing_address')
                ->required()
                ->label(__('filament-teambable::default.fields.billing_address')),
            Forms\Components\TextInput::make('billing_city')
                ->required()
                ->label(__('filament-tenant::default.fields.billing_city')),
            Forms\Components\TextInput::make('billing_state')
                ->required()
                ->label(__('filament-tenant::default.fields.billing_state')),
            Forms\Components\TextInput::make('billing_zip')
                ->required()
                ->label(__('filament-tenant::default.fields.billing_zip')),
            Forms\Components\TextInput::make('billing_country')
                ->required()
                ->label(__('filament-tenant::default.fields.billing_country')),
        ])->columnSpan(3);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getProfileFormSchema())->columns(3)
            ->statePath('data');
    }
}
