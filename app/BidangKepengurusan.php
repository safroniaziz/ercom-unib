<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BidangKepengurusan extends Model
{
    protected $table = 'tb_bidang_kepengurusan';
    protected $primaryKey = 'id_bidang';
    protected $fillable = ['nm_bidang'];
    public $timestamps = false;
}