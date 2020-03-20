<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sparepart extends Model
{
    protected $guarded = [];

    public function manufacturer()
    {
        return $this->hasOne('App\Models\Manufacturer', 'id', 'manufacturer_id');
    }
}
