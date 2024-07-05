<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class blog extends Model
{
    use HasFactory;
    public function blogImage(){
        return $this->hasMany(BlogImage::class);
    }

    public function Category(){
        return $this->belongsTo(Category::class);
    }


    
}
