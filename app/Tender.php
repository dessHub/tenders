<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Tender extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'file', 'dateline', 'description', 'category', 'status', 'awarded_to', 'c_name',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        //
    ];
}
