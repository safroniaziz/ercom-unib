<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengurus extends Model
{
    protected $table = 'tb_pengurus';
    protected $primaryKey = 'id_pengurus';
    protected $fillable = ['nm_pengurus','npm','id_jabatan','id_prodi','id_bidang','id_tahun_kepengurusan','telp','email','fb','instagram','foto'];
    public $timestamps = false;
}
