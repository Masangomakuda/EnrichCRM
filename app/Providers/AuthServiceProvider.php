<?php

namespace App\Providers;

use App\Models\Clients;
use App\Models\User;
use App\Policies\ClientsPolicy;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Model' => 'App\Policies\ModelPolicy',
        Clients::class => ClientsPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();


        Gate::define('manage_clients',function(User $user){
            /** if($user->is_admin == 1){
            *    return true;
            * }
            * return false;
            */ 
            return $user->is_admin
                ?Response::allow()
                :Response::deny('You Dont have Rights to access this page');
        });


        Gate::define('manage_roles',function(User $user){
            return $user->is_admin
            ?Response::allow()
            :Response::deny('You Dont have Rights to access this page');
        });
    }
}
