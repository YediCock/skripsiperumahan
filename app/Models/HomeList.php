<?php

namespace App\Models;

use App\Models\HomeImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HomeList extends Model
{
    use HasFactory;
    protected $fillable = [
        'category_id',
        'block_id',
        'unit_number',
        'name',
        'slug',
        'desc',
        'building_area',
        'land_area',
        'number_of_bedrooms',
        'number_of_bathrooms',
        'price',
        'electrical_power',
        'status',
        'floorplan',
        'sketch_image',
        'x_coordinate',
        'y_coordinate'
    ];
    public function homeImage()
    {
        return $this->hasMany(HomeImage::class,'home_id','id');
    }
    public function homeCategory()
    {
        return $this->belongsTo(HomeCategory::class, 'category_id', 'id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class, 'block_id', 'id');
    }
    public function getPriceAttribute()
    {
        return 'Rp. ' . number_format($this->attributes['price']);
        // if ($this->homeCategory->slug == 'sewa') {
        //     return 'Rp. ' . number_format($this->attributes['price']) . ' Juta / bulan';
        // } else {
        //     return 'Rp. ' . number_format($this->attributes['price']) . ' Juta';
        // }
    }    
    public function bookings()
    {
        return $this->hasMany(Booking::class,'home_id','id');
    }
    public function scopeSearch($query, $keyword)
    {
        return $query->where('name', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('building_area', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('land_area', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('number_of_bedrooms', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('number_of_bathrooms', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('electrical_power', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('price', 'LIKE', '%' . $keyword . '%')
                    ->orWhere('status', 'LIKE', '%' . $keyword . '%');
    }
}
