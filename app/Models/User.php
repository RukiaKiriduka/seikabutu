<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image_url', 
    ];
    
    protected $attributes = [
        'content' => null,

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
     public function posts()
    {
        return $this->hasMany(Post::class);
    }
    
    public function todos()
    {
        return $this->hasMany(Todo::class);
    }
    
     public function getPaginateByLimit(int $limit_count = 100)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        //return $this::with('time')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
}
