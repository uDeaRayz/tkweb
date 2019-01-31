<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AddLeave extends Model
{
    protected $table = 'add_leaves';
    public $timestamps = true;
    protected $primaryKey = 'add_id';
}
