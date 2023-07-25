<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body',
        'date',
        'time_id',
        'user_id',
    ];

    public function getPaginateByLimit(int $limit_count = 5)
    {
        // updated_atで降順に並べたあと、limitで件数制限をかける
        //return $this::with('time')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function time()
{
    return $this->belongsTo(Time::class);
}

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
