<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    protected $table = 'provinces';
    public $timestamps = true;
    protected $primaryKey = 'prov_id';
}
