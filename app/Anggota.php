<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table = 'tb_anggota';
    protected $primaryKey = 'id_anggota';
    protected $fillable = ['nm_anggota','npm','id_bidang','id_prodi','telp','email','fb','instagram','foto'];
    public $timestamps = false;
}
