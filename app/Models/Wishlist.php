<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;
    protected $fillable = ['home_id', 'customer_id'];
    public function homeList()
    {
        return $this->belongsTo(HomeList::class, 'home_id');
    }
}
