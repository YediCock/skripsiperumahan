<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $fillable = ['home_id', 'customer_id', 'status'];

    public function homeList()
    {
        return $this->belongsTo(HomeList::class, 'home_id');
    }

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function homeImage()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }   
    // public function scopeSearch($query, $keyword)
    // {
    //     return $query->where('name', 'LIKE', '%' . $keyword . '%')
    //                 ->orWhere('building_area', 'LIKE', '%' . $keyword . '%')
    //                 ->orWhere('land_area', 'LIKE', '%' . $keyword . '%')
    //                 ->orWhere('number_of_bedrooms', 'LIKE', '%' . $keyword . '%')
    //                 ->orWhere('number_of_bathrooms', 'LIKE', '%' . $keyword . '%')
    //                 ->orWhere('electrical_power', 'LIKE', '%' . $keyword . '%')
    //                 ->orWhere('price', 'LIKE', '%' . $keyword . '%')
    //                 ->orWhere('status', 'LIKE', '%' . $keyword . '%');
    // }
    public function scopeSearch($query, $keyword)
    {
        return $query->where(function ($query) use ($keyword) {
            $query->where('status', 'LIKE', '%' . $keyword . '%')
                ->orWhereHas('customer', function ($query) use ($keyword) {
                        $query->where('name', 'LIKE', '%' . $keyword . '%')
                            ->orWhere('phone', 'LIKE', '%' . $keyword . '%');
                })
                ->orWhereHas('homeList', function ($query) use ($keyword) {
                    $query->where('name', 'LIKE', '%' . $keyword . '%')
                            ->orWhereHas('homeCategory', function ($query) use ($keyword) {
                                $query->where('name', 'LIKE', '%' . $keyword . '%');
                            });
            });
        });
    }
}
