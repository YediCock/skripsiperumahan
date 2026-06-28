<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Block extends Model
{
    use HasFactory;

    protected $fillable = ['home_category_id', 'name', 'slug'];

    public function homeCategory()
    {
        return $this->belongsTo(HomeCategory::class, 'home_category_id', 'id');
    }

    public function homeList()
    {
        return $this->hasMany(HomeList::class, 'block_id', 'id');
    }
}
