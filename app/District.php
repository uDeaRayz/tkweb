<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districs';
    public $timestamps = true;
    protected $primaryKey = 'dist_id';
}
