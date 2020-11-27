<?php

namespace App;

use App\Traits\DefaultProfile;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, SoftDeletes, HasFactory, DefaultProfile;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'firstname',
        'lastname',
        'profile_photo_path',
        'mobile_number',
        'address',
        'description',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'deleted_at',
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'full_name',
        'single_role_name',
    ];

    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    public function updateProfilePhoto($photo)
    {
        if($photo){
            // dd($this->profile_photo_path);
            $this->deletepreviousImage($this->profile_photo_path);

            $image = $photo->storePublicly('profile-photos',$this->profilePhotoDisk());

            $this->update(['profile_photo_path' => $image]);
        }
    }

    /**
     * Get the URL to the user's profile photo.
     *
     * @return string
     */
    public function getProfilePhotoUrlAttribute()
    {
        return $this->profile_photo_path
            ? Storage::disk($this->profilePhotoDisk())->url($this->profile_photo_path)
            : $this->defaultProfilePhotoUrl();
    }

    public function getFullNameAttribute()
    {
        return (!empty($this->firstname && $this->lastname))
            ? "{$this->firstname} {$this->lastname}"
            : "{$this->name}";
    }

    public function scopeWithRolesFilter($query, $userRole)
    {
        return $query->whereHas('roles', function ($query) use ($userRole) {
            $query->where('name', $userRole);
        });
    }

    public function scopeGet_All_User_WithDoesntHave_SuperAdmin_Role($query)
    {
        return  $query->whereDoesntHave('roles', function ($query) {
            $query->where('id', 1);
        });
    }

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            # Here condition check if user is logged in and create a User model then assign role otherwise else condition
            if (Auth::check()) {
                $user->assignRole(2); # Role 2 Admin

            } else {
                $user->assignRole(3); # Role 3 User default registration

            }
        });
    }

    /** Below Relationship part add */

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /** get Single Role Name instead of collection getRoleNames() */

    public function getSingleRoleNameAttribute()
    {
        return '@'.$this->getRoleNames()->last();
    }

    /** User has many BookingEvents */

    public function bookingEvents()
    {
        return $this->hasMany( BookingEvent::class );
    }

    public function bookingCustomers()
    {
        return $this->hasMany( BookingCustomer::class );
    }

    public function favorites()
    {
        return $this->belongsToMany(Post::class, 'favorites', 'user_id', 'post_id')->withTimeStamps();
    }
}
