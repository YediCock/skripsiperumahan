<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeImage extends Model
{
    use HasFactory;
    protected $fillable = ['home_id', 'image'];
    public function homeList()
    {
        return $this->belongsTo('App\Models\HomeList', 'home_id', 'id');
    }
}
