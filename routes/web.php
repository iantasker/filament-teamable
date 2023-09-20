<?php

use Filament\Facades\Filament;
use Illuminate\Support\Facades\Route;
use FilamentTenant\Features;
use FilamentTenant\Http\Controllers\TenantInvitationController;
use FilamentTenant\Http\Controllers\OAuthController;
use FilamentTenant\Models\Tenant;
use FilamentTenant\Pages\Auth\PrivacyPolicy;
use FilamentTenant\Pages\Auth\Terms;
use FilamentTenant\Socialite;

Route::name('filament.')
    ->group(static function () {
        foreach (Filament::getPanels() as $panel) {
            $hasPlugin = $panel->hasPlugin('filament-tenant');

            if (!$hasPlugin) {
                continue;
            }

            $panelId = $panel->getId();
            $domains = $panel->getDomains();
            $hasTenancy = $panel->hasTenancy();
            $plugin = $panel->getPlugin('filament-tenant');

            foreach ((empty($domains) ? [null] : $domains) as $domain) {
                Route::domain($domain)
                    ->middleware($panel->getMiddleware())
                    ->name("{$panelId}.")
                    ->prefix($panel->getPath())
                    ->group(static function () use ($plugin, $hasTenancy) {
                        
                        $tenant_types = Tenant::childTypes;
                        
                        foreach($tenant_types as $tenant_type) {
                            $singleSlug = Str::kebab(class_basename($tenant_type));
                            $pluralSlug = Str::kebab(Str::plural(class_basename($tenant_type)));

                            $oauth_route = "/$pluralSlug/oauth/{provider}";
                            $oauth_callback_route = "/{$pluralSlug}/oauth/{provider}/callback";

                            if (Socialite::hasSocialiteFeatures() && $plugin->socialite()) {
                                Route::get($oauth_route, [OAuthController::class, 'redirectToProvider'])->name('oauth.redirect');
                                Route::get($oauth_callback_route, [OAuthController::class, 'handleProviderCallback'])->name('oauth.callback');
                            }

                            if (Features::hasTermsAndPrivacyPolicyFeature() && $plugin->termsAndPrivacyPolicy()) {
                                Route::get(Terms::getSlug(), Terms::class)->name(Terms::getRouteName());
                                Route::get(PrivacyPolicy::getSlug(), PrivacyPolicy::class)->name(PrivacyPolicy::getRouteName());
                            }

                            $invitations_route = "/$singleSlug/mpany-invitations/{invitation}";

                            if (Features::hasCompanyFeatures() && $plugin->tenants(invitations: true)) {
                                Route::get($invitations_route, [TenantInvitationController::class, 'accept'])
                                    ->middleware(['signed'])
                                    ->name('tenant-invitations.accept');
                            }
                        }
                    });
            }
        }
    });