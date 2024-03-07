<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;

    protected $fillable=[
        'title',
        'course_id',
        
    ];
   
 
    public function course(){
        return $this->belongsTo(Course::class);
    }
    public function videos(){
        return $this->hasMany(Video::class);
    }
}
