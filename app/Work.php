<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = 'works';
    public $timestamps = true;
    protected $primaryKey = 'work_id';
    protected $fillable = ['user_id','position','prov_id','dist_id','subdist_id','detail','img'];
}
