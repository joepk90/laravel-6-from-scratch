<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function articles()
    {
        return $this->hasMany(Article::class); // select * from articles where user_id = {CURRENT USER_ID}
    }

    public function projects()
    {
        return $this->hasMany(Project::class); // select * from articles where user_id = {CURRENT USER_ID}
    }

    public function routeNotificationForNexmo($notification)
    {
        // return $this->phone_number;
        return '99999999999'; // change this (hardcoded for testing purposes).
    }

    public function conversations()
    {
        return $this->hasMany(Conversation::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function assignRole($role)
    {

        if (is_string($role)) {
            $role = Role::whereName($role)->firstOrFail();
        }

        return $this->roles()->sync($role, false);
    }

    public function abilities()
    {
        return $this->roles->map->abilities->flatten()->pluck('name')->unique();
    }
}

/**
 * Elequent Collection Example
 */

// $user = User::find(1); // select * from user where id = 1
// $user->projects // select * from projects where user_id = $user->id

// working with a users projects example
// $user->projects
// $user->projects->first()
// $user->projects->last()
// $user->projects->find()
// $user->projects->splt(3)