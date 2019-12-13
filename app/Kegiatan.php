<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kegiatan extends Model
{
    protected $table = 'tb_kegiatan';
    protected $primaryKey = 'id_kegiatan';
    protected $fillable = ['judul_kegiatan','id_bidang','isi','gambar_kegiatan'];
    public $timestamps = false;
}