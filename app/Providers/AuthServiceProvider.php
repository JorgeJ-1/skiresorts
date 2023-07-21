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
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        'App\Models\SkiResort' => 'App\Policies\SkiResortPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        // Se comenta porque los accesos se controlan usando policies
        /*
        Gate::define('skiresortdelete', function($user,$skiResort)
        {
            return $user->id == $skiResort->user_id;    
        });
        */
    }
}
