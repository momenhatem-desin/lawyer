<?php

namespace App;
use App\Observers\CategoryObserver;

use Illuminate\Database\Eloquent\Model;
use LaravelLocalization;
class Category extends Model
{

    protected $table ='categories';
    
    protected $fillable = [
        'name_ar', 'name_en','photo', 'status','created_at','updated_at',
    ];

    protected static function boot()
    {
        parent::boot();
        Category::observe(CategoryObserver::class);
    }

    public function getStatus()
    {
        return $this->status == 1 ? 'مفعل' : 'غير مفعل';

    }
      
   public function getPhotoAttribute($val)
    {
      return ($val !== null) ? asset('/' . $val) : "";
    }

    public function scopeActive($query)
    {
        return $query->where('status', 1);
    }

    public function aposts(){
        return $this->hasMany('App\Apost');
    }

    public function scopeSelection($query)
    {
        return $query->select(
           'id',
          'name_'. LaravelLocalization::getCurrentLocale() . ' as name',
          'photo'
          )->where('status', 1);
    }

}
