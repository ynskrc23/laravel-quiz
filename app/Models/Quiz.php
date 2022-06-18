<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Carbon\Carbon;

class Quiz extends Model
{
    use HasFactory;
    use Sluggable;

    protected $fillable = ['title','description','status','finished_at','slug'];
    protected $dates = ['finished_at'];
    protected $appends = ['details'];

    public function getDetailsAttribute(){
        if($this->results()->count() > 0)
        {
            return [
                'average' => round($this->results()->avg('point')),
                'join_count' => $this->results()->count()
            ];
        }
        return null;
    }

    public function results(){
        return $this->hasMany('App\Models\Result');
    }

    public function topTen(){
        return $this->results()->orderByDesc('point')->take(10);
    }

    public function my_result(){
        return $this->hasOne('App\Models\Result')->where('user_id',auth()->user()->id);
    }

    public function getFinishedAttributes($date){
        return date ? Carbon::parse($date) : null;
    }

    public function questions(){
        return $this->hasmany('App\Models\Question');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'onUpdate' => true,
                'source' => 'title'
            ]
        ];
    }
}
