<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailPesan extends Model
{
    protected $table = "detail_pesan";
    protected $fillable = ['no_pesan', 'kd_brg', 'qty_pesan','subtotal'];

}
