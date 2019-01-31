<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    public $timestamps = true;
    protected $primaryKey = 'atten_id';
}
