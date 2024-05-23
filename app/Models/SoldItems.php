<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SoldItems extends Model
{
    protected $guarded = [];

    public function sales() {
        return $this->belongsTo('App\Models\Sales');
    }

    public function product() {
        return $this->belongsTo('App\Models\Product');
    }
}
