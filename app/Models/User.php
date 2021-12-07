<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $guarded = [];
    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'phone', 
        'password',
        'provider' => $provider,
        'provider_id' => $user->id,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected static function boot()
    {
        parent::boot();

        static::created(function ($user) {
            $user->profile()->create([
                'address' =>'Chưa cung cấp',
            ]);

          
        });
    }


    public function profile(){
        return $this->hasOne(Profile::class);
    }

    public function posts(){
        return $this->hasMany(Post::class)->orderBy('created_at', 'DESC');
    }
    public function comments(){
        return $this->hasMany(Comment::class)->orderBy('created_at', 'ASC');
    }
    public function feedbacks(){
        return $this->hasMany(Feedback::class)->orderBy('created_at', 'DESC');
    }
    public function following(){
        return $this->belongsToMany(Profile::class);
    }
    public function saved_posts(){
        return $this->belongsToMany(Post::class);
    }
    
}
