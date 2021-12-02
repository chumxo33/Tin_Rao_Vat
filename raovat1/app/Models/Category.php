<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

// App\Models\Category.php
class Category extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
    
    public function articles(){
        return $this->belongsToMany('App\Models\Article');
    }
    public function parentCategory(){   //1-n
        return $this->belongsTo('App\Models\Category');
    }

    public function children(){ //những thằng con category
        return $this->hasMany('App\Models\Category', 'parent_id');
    }
}
