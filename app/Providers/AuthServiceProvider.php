<?php

namespace App\Providers;
use App\Models\User;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        Gate::define('admin-access', function (User $user) {
            return $user->admin===0;
        });
        
        Gate::define('leader-access', function (User $user) {
            return $user->admin === 1;
        });
        
        Gate::define('superviseur-access', function (User $user) {
            return $user->admin === 2;
        });
        
        Gate::define('agent-access', function (User $user) {
            return $user->admin === 3;
        });
        
    }
}
