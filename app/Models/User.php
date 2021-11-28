<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'avatar_id',

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
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->belongsTo(Post::class);
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

        return ("bg.png");
    }
}
