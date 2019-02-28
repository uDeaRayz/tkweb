<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Qrcode extends Model
{
    protected $table = 'qrcode';
    protected $primaryKey = 'id';
    protected $fillable = ['qr_date','qr_id'];

}
