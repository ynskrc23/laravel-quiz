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

    protected $fillable = ['title','description','finished_at','slug'];
    protected $dates = ['finished_at'];

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
