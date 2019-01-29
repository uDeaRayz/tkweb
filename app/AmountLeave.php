<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AmountLeave extends Model
{
    protected $table = 'amount_leaves';
    public $timestamps = true;
    protected $fillable = [
        'leave_name', 'user_id' ,'amount_num'
    ];
    protected $primaryKey = 'amount_id';
}
