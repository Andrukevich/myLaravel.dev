<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path'];

    public $timestamps = false;

    public function setPathAttribute($value)
    {
        list($folder, $img_name) = explode('/', $value);
        $this->attributes['path'] = $value;
        $this->attributes['th_path'] = $folder . '/' . 'th_' . $img_name;
    }
}
