<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'positions';
    public $timestamps = true;
    protected $fillable = [
        'leave_name', 'leave_num'
    ];
}
