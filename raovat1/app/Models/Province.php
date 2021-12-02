<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    use HasFactory;

    public function districts()
    {
         return $this->belongsTo(Province::class, config('vietnam-maps.columns.province_id'), 'id');
    }
    public function articles(){
        return $this->belongsToMany('App\Models\Article');
    }
}
