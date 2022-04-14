<?php

namespace App\Models;

use App\Helpers\Constants;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use app\Models\Post;
use Spatie\Permission\Traits\HasRoles;



class User extends Authenticatable implements MustVerifyEmail
{
    use  HasFactory, Notifiable, HasRoles, HasApiTokens ;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'avatar',
        'name',
        'phone',
        'email',
        'username',
        'role',
        'last_login',
        'password',
        'is_email_verified'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime',
        'email_verified_at' => 'datetime',
    ];

    public function post()
    {
        return $this->hasMany(Post::class);
    }

    public function isAdmin()
    {
        return $this->role == Constants::ADMIN_USER;
    }

    public function removeAdmin()
    {
        return $this->role == Constants::DEFAULT_USER;
    }
    public function avatar()
    {
        return $this->hasOne(File::class, "id", "avatar_id");
    }

    public function avatarUrl()
    {
        $avatar = $this->avatar;

        $filepath = optional($avatar)->path;

        if (!empty($filepath)) {
            return readFileUrl("encrypt", $filepath);
        }
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
