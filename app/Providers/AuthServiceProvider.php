<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Conversation;
use App\User;

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

        // logic handled in ConversationPolicy
        // requires a validated user (i.e. must be signed in)
        // using ?User $user would make the registered user requirement optional
        // Gate::define('update-conversation', function (User $user, Conversation $conversation) {

        // return true if the user owns the conversation
        // return $conversation->user->is($user);
        // });

        Gate::before(function (User $user) {
            if ($user->id === 3) {
                return true;
            }
        });
    }
}
