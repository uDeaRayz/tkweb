<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddLeave extends Model
{
    protected $table = 'add_leaves';
    public $timestamps = true;
    protected $primaryKey = 'add_id';
    protected $fillable = ['user_id','amount_id','add_type','date_start','date_end','total','img','detail','status','resson_id','comment'];
}
