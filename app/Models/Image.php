<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $fillable=[
        'image',
        'course_id',
    ];
 
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
