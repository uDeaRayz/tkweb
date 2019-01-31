<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    protected $table = 'works';
    public $timestamps = true;
    protected $primaryKey = 'work_id';
}
