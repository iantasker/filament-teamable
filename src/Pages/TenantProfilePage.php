<?php

namespace FilamentTenant\Pages;

use Filament\Pages\Page;

class TenantProfilePage extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $slug = 'profile';

    protected static string $view = 'filament-tenant::filament.pages.profile';

    public function getLabel(): string
    {
        return __('filament-tenant::default.profile.tenant_profile');
    }

    public function getHeading(): string
    {
        return __('filament-tenant::default.profile.tenant_profile');
    }

    public function getSubheading(): ?string
    {
        return __('filament-tenant::default.profile.subheading') ?? null;
    }

    public static function getNavigationLabel(): string
    {
        return __('filament-tenant::default.profile.profile');
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function getRegisteredTenantProfileComponents(): array
    {
        return filament('filament-tenant')->getRegisteredTenantProfileComponents();
    }

    public static function canView(): bool
    {
        return true;
    }
}
