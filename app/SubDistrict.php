<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDistrict extends Model
{
    protected $table = 'subdistricts';
    public $timestamps = true;
    protected $primaryKey = 'subdist_id';
}
