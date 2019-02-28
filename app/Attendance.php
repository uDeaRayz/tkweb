<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $table = 'attendances';
    public $timestamps = true;
    protected $primaryKey = 'atten_id';
    protected $fillable = ['user_id','atten_date','time_in','time_out','atten_total','img_in','img_out'];
}
