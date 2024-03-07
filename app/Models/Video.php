<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'video',
        'duration',
        'course_id',
        'stage_id'
        
    ];
   
 
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function stage(){
        return $this->belongsTo(Stage::class);
    }
}
