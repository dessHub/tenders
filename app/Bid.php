<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Bid extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'tender_id', 'user_id', 'c_name', 'kra_pin', 'proposal', 'file',
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
