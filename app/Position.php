<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    protected $table = 'positions';
    public $timestamps = true;
    protected $fillable = [
        'post_name', 'post_id'
    ];

    protected $primaryKey = 'post_id';
}
