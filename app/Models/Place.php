<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Place extends Model
{
    use HasFactory;
    
    protected $fillable = ['name', 'address', 'tel', 'lat', 'lng', 'detail'];
    
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
