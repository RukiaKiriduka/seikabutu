<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'date',
        'time_id',
        'user_id',
        'A1','A2','A3','A4','A5','A6','B1','B2','B3','B4','B5','B6',
        'C1','C2','C3','C4','C5','C6','D1','D2','D3','D4','D5','D6',
        'E1','E2','E3','E4','E5','E6',
    ];

    public function getPaginateByLimit(int $limit_count = 10)
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
