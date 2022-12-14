<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = ["review"];
    
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function place()
    {
        return $this->belongsTo(Place::class);
    }
    
    public function images()
    {
        return $this->hasMany(Image::class);
    }
}
