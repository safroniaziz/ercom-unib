<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TahunKepengurusan extends Model
{
    protected $table = 'tb_tahun_kepengurusan';
    protected $primaryKey = 'id_tahun_kepengurusan';
    protected $fillable = ['nm_tahun_kepengurusan'];
    public $timestamps = false;
}
