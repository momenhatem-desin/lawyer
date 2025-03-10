<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leasson extends Model
{
    protected $table ='leassons';
    protected $fillable = [
        'index_name', 'image_url', 'leasson',
    ];

}
