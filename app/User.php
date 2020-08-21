<?php

namespace App;

use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable, HasRoles;

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

    protected $with = ['roles'];

    // public function scopeWithoutSuperAdmin($query) {
    //     return $query->where('id','!=',1);
    // }

    public function scopeWithRolesFilter($query, $userRole)
    {
        return $query->whereHas('roles', function ($query) use ($userRole) {
            $query->where('name', $userRole);
        });
    }

    public function scopeGet_All_User_WithDoesntHave_SuperAdmin_Role($query) {
        return  $query->whereDoesntHave('roles', function ($query) {
            $query->where('id', 1);
        });
    }

    public function posts() {
        return $this->hasMany( Post::class );
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user){
            # Here condition check if user is logged in and create a User model then assign role otherwise else condition
            if (Auth::check()) {
                $user->assignRole(2); # Role 2 Admin

            } else {
                $user->assignRole(3); # Role 3 User default registration

            }

        });
    }
}
