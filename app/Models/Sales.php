<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $guarded = [];

    public function soldItems() {
        return $this->hasMany('App\Models\SoldItem');
    }
}
