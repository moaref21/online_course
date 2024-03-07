<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'coach',
        'description',
        'level',
       'duration'
        
    ];
   
 
    public function images(){
        return $this->hasMany(Image::class);
    }
    public function stages(){
        return $this->hasMany(Stage::class);
    }
}
