<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berita extends Model
{
    protected $table = 'tb_berita';
    protected $primaryKey = 'id_berita';
    protected $fillable = ['id_jenis_berita','judul_berita','isi_berita','created_at','foto'];
}
