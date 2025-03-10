<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use LaravelLocalization;
class Apost extends Model
{
    use SoftDeletes;
   
    protected $fillable = [//this 
        'title_ar','title_en', 'content_er','content_en', 'featrued','category_id','slug'
    ];

    protected $dates = ['deleted_at'];

    public function getfeatruedAttribute($val)
    {
      return ($val !== null) ? asset('/' . $val) : "";
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function tags(){
        return $this->belongsToMany('App\Tag');
    }
    public function user(){
        return $this->belongsTo('App\User');
    }
    public function comments(){
        return $this->hasMany('App\Command','apost_id','id');
    }

    public function scopeSelection($query)
    {
        return $query->select(
           'id',
          'title_'. LaravelLocalization::getCurrentLocale() . ' as title',
          'content_'. LaravelLocalization::getCurrentLocale() . ' as content',
          'featrued', 
          'category_id',
          'slug',
          'created_at'
        )->where('status', 1);
    }

}
