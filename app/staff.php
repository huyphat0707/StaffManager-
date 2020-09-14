<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class staff extends Model
{
    //
    protected $table = 'staff';
    protected $fillable = [
        'name', 'email', 'age',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
