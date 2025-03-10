<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use LaravelLocalization;

class Tag extends Model
{


    protected $fillable = [//this 
        'tag_ar', 'tag_en',
    ];

    public function aposts(){
        return $this->belongsToMany('App\Apost');
    }

    public function scopeSelection($query)
    {
        return $query->select(
           'id',
          'tag_'. LaravelLocalization::getCurrentLocale() . ' as tag'
        );
    }

    
}
