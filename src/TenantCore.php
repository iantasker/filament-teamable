<?php

namespace FilamentTenant;

use Closure;
use Filament\Forms;
use Filament\Panel;
use Livewire\Livewire;
use Filament\Contracts\Plugin;
use Filament\Facades\Filament;
use Filament\Navigation\MenuItem;
use Filament\Support\Concerns\EvaluatesClosures;
use FilamentTenant\Pages;

class TenantCore implements Plugin
{
    use EvaluatesClosures;

    public static $userModel = 'App\\Models\\User';

    public static $membershipModel = 'App\\Models\\Membership';

    protected $hasProfile = false;
    protected $hasAddress = false;
    protected $registeredTenantProfileComponents = [];

    public function getId(): string
    {
        return 'filament-tenant';
    }

    public function register(Panel $panel): void
    {
        $panel->pages([
            Pages\TenantProfilePage::class
        ]);
    }

    public function boot(Panel $panel): void
    {   
        if ($this->hasProfile) {
            Livewire::component('tenant_info', Livewire\TenantInfo::class);
            $this->tenantProfileComponents(array_merge([
                'tenant_info' => Livewire\TenantInfo::class,
            ], $this->registeredTenantProfileComponents));

            $panel->tenantMenuItems([
                 'profile' => MenuItem::make()->url(fn () => (Pages\TenantProfilePage::getUrl()))->label(__('Settings')),
             ]);
        }
    }

    public function auth()
    {
        return Filament::getCurrentPanel()->auth();
    }

    public function getCurrentPanel()
    {
        return Filament::getCurrentPanel();
    }

    public function profile(bool $condition = true): static
    {
        $this->hasProfile = $condition;

        return $this;
    }

    public function hasProfile(): bool
    {
        return $this->hasProfile;
    }

    public function address(bool $condition = true): static
    {
        $this->hasAddress = $condition;

        return $this;
    }

    public function hasAddress(): bool
    {
        return $this->hasAddress;
    }

    public function tenantProfileComponents(array $components)
    {
        $this->registeredtenantProfileComponents = [
            ...$this->registeredTenantProfileComponents,
            ...$components,
        ];
        
        return $this;
    }

    public function getRegisteredTenantProfileComponents(): array
    {
        $components = $this->registeredTenantProfileComponents;
        return collect($components)->all();
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        return filament(app(static::class)->getId());
    }

    public static function userModel()
    {
        return static::$userModel;
    }

    public static function newUserModel()
    {
        $model = static::userModel();

        return new $model;
    }

    public static function useUserModel(string $model)
    {
        static::$userModel = $model;

        return new static;
    }

    public static function membershipModel()
    {
        return static::$membershipModel;
    }

    public static function useMembershipModel(string $model)
    {
        static::$membershipModel = $model;

        return new static;
    }
}
