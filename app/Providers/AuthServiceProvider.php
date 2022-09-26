<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;

use App\Models\User;
use App\Models\Vulnerability;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
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

        $this->registerVulnerabilityGates();
    }

    protected function registerVulnerabilityGates(): void
    {
        Gate::define('vulnerability.create', function (User $user) {
            return true;
        });

        Gate::define('vulnerability.update', function (User $user, Vulnerability $vulnerability) {
            return $user->is($vulnerability->user);
        });

        Gate::define('vulnerability.destroy', function (User $user, Vulnerability $vulnerability) {
            return $user->is($vulnerability->user);
        });
    }
}
