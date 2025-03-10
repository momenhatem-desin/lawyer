<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{

    public function getavatarAttribute($val)
    {
      return ($val !== null) ? asset('/' . $val) : "";
    }
    

    protected $fillable = [
        'user_id', 'avatar', 'facebook','twitter','githup','about',
    ];

    public function user(){

        return $this->belongsTo('App\User');
    }
}
