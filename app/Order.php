<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'name', 'age',
        'weight', 'height',
        'price', 'special_price'
    ];

    public function image() // image_id
    {
        return $this->hasMany(\App\Image::class);
    }
}