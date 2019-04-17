<?php

namespace App;

use App\Tag;
use App\Role;
use App\note;
use App\Message;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

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

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'assigned_roles');
    }
    public function hasRoles(array $roles)
    {
           // dd($roles);
        // dd($this->roles->pluck('name')->intersect($roles));
        return $this->roles->pluck('name')->intersect($roles)->count();
        // foreach ($roles as $role) {
        //     foreach ($this->roles as $userRoles) {
        //         if ($userRoles->name === $role) {
        //             return true;
        //         }
        //     }
        // }
        // return false;
    }

    public function isAdmin()
    {
        return $this->hasRoles(['admin']);
    }

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function note()
    {
        return $this->morphOne(Note::class, 'notable');
    }    

    public function tags()
    {
        return $this->morphToMany(Tag::class,'taggable')->withTimestamps();
    }

}
