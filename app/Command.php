<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Command extends Model
{
    protected $fillable = [
        'post_id', 'email', 'commend',
    ];

    public function apost(){
        return $this->belongsTo('App\Apost','apost_id','id');
    }
}
