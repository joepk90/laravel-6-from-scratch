<?php

namespace App\Policies;

use App\Conversation;
use App\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class ConversationPolicy
{
    use HandlesAuthorization;

    /**
     * Before Hook
     * Note: only return if false (using return will stop any proceeding methods from being called)
     * 
     * Moved to global layer: Auth Service Provider
     * 
     */
    // public function before(User $user)
    // {

    //     if ($user->id === 3) {
    //         return true;
    //     }
    // }

    public function view(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
    }

    /**
     * Determine whether the user can update the conversation.
     *
     * @param  \App\User  $user
     * @param  \App\Conversation  $conversation
     * @return mixed
     */
    public function update(User $user, Conversation $conversation)
    {
        return $conversation->user->is($user);
    }
}
