<?php

namespace App;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use Notifiable, HasRoles, SoftDeletes;

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
    ];

    /**
     * Update the user's profile photo.
     *
     * @param  \Illuminate\Http\UploadedFile  $photo
     * @return void
     */
    public function updateProfilePhoto(UploadedFile $photo)
    {
        tap($this->profile_photo_path, function ($previous) use ($photo) {
            $this->forceFill([
                'profile_photo_path' => $photo->storePublicly(
                    'profile-photos', ['disk' => $this->profilePhotoDisk()]
                ),
            ])->save();

            if ($previous) {
                Storage::disk($this->profilePhotoDisk())->delete($previous);
            }
        });
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

    /**
     * Get the default profile photo URL if no profile photo has been uploaded.
     *
     * @return string
     */
    protected function defaultProfilePhotoUrl()
    {
        return 'https://ui-avatars.com/api/?name='.urlencode($this->name).'&color=7F9CF5&background=EBF4AA';
    }

    /**
     * Get the disk that profile photos should be stored on.
     *
     * @return string
     */
    protected function profilePhotoDisk()
    {
        return isset($_ENV['VAPOR_ARTIFACT_NAME']) ? 's3' : 'public';
    }

    public function getFullNameAttribute()
    {
        return ( !empty($this->firstname && $this->lastname) )
                ? "{$this->firstname} {$this->lastname}"
                : "{$this->name}";
    }

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
