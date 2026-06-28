<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeCategory extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'slug', 'image', 'address', 'brochure_image', 'site_plan_image'];

    public function homeList()
    {
        return $this->hasMany(HomeList::class, 'category_id', 'id');
    }

    public function blocks()
    {
        return $this->hasMany(Block::class, 'home_category_id', 'id');
    }
    public function scopeSearch($query, $keyword)
    {
        return $query->where('name', 'LIKE', '%' . $keyword . '%');
    }
}
