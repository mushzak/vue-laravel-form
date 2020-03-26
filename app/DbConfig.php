<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DbConfig extends Model
{
    protected $fillable = [
        'host', 'database', 'table','user','password'
    ];
}
