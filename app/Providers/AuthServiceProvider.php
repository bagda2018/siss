<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use App\User;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *@param \Illuminate\Contracts\Auth\Access\Gate $gate
     * @return void
     */
    public function boot(\Illuminate\Contracts\Auth\Access\Gate $gate)
    {
        $this->registerPolicies($gate);
        
//        $gate->define('update-post', function (User $user, Notice $notice){
//            return $user->id == $notice->user_id;
//        });
        
        $permissions = \App\Permission::with('roles')->get();
        
        foreach ($permissions as $permission)
        {
           $gate->define($permission->nome, function (User $user)use ($permission){
            return $user->hasPermission($permission);
        }); 
        }
        
        $gate->before(function (User $user){
            if ($user->peloMenos1Regra('ROLE_SUPER_ADMIN'))
                return true;
        });
    }
}