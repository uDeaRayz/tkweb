<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Resson extends Model
{
    protected $table = 'ressons';
    public $timestamps = true;
    protected $fillable = [
        'resson_name', 'leave_id'
    ];
    protected $primaryKey = 'resson_id';
}
