<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leaves';
    public $timestamps = true;
    protected $fillable = [
        'leave_name', 'leave_num'
    ];
    protected $primaryKey = 'leave_id';
}
