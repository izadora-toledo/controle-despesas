<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Policies\UserPolicy;
use App\Models\User;
use App\Models\Despesa;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [
        Despesa::class => DespesaPolicy::class,
        User::class => UserPolicy::class,
    ];

    public function boot()
    {
        $this->registerPolicies();

        Gate::resource('users', UserPolicy::class);
    }
}
