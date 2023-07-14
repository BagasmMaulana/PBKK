<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('isResto', function($user) {
        return $user->role == 'RESTO';
        });
        Gate::define('isKurir', function($user) {
        return $user->role == 'KURIR';
        });
        Gate::define('isKonsumen', function($user) {
        return $user->role == 'KONSUMEN';
        });
            }
}
