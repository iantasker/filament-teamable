<?php

namespace FilamentTenant\Livewire;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Facades\Filament;
use Filament\Notifications\Notification;

class TenantInfo extends TenantProfileComponent
{
    protected string $view = "filament-tenant::livewire.tenant-info";

    public ?array $data = [];
    public $panel;
    public $tenant;
    public $tenantClass;

    public function mount()
    {
        $this->panel = Filament::getCurrentPanel();
        $this->tenant = Filament::getTenant();
        $this->tenantClass = get_class($this->tenant);
        $this->form->fill($this->tenant);
    }

    protected function getProfileFormSchema()
    {
        return Forms\Components\Group::make([
            Forms\Components\TextInput::make('name')
                ->required()
                ->label(__('filament-teambable::default.fields.name')),
            Forms\Components\TextInput::make('email')
                ->required()
                ->email()
                ->unique($this->userClass, ignorable: $this->user)
                ->label(__('filament-tenant::default.fields.email'))
        ])->columnSpan(3);
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema($this->getProfileFormSchema())->columns(3)
            ->statePath('data');
    }

    public function submit()
    {
        $data = collect($this->form->getState())->all();
        $this->tenant->update($data);
        Notification::make()
            ->success()
            ->title(__('filament-tenant::default.profile.tenant_info.notify'))
            ->send();
    }

}
