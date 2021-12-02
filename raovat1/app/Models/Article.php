<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    // App\Models\Article
    protected $fillable = ['user_id', 'title', 'content',
                            'province_id', 'district_id', 'ward_id', 'valid_date',
                            'is_vip', 'thumbnail',
    ];

    public function categories(){
        return $this->belongsToMany('App\Models\Category');
    }
    // App\Models\Article
    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function provinces(){
        return $this->belongsToMany('App\Models\Province');
    }
}
