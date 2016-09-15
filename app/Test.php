<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Test extends Model
{

    public function getEmailAttribute()
    {
        return ucfirst($this->attributes['email']);
    }

    public function toUppercase()
    {
        return strtoupper($this->email);
    }
}
