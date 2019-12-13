<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisBerita extends Model
{
    protected $table = 'tb_jenis_berita';
    protected $primaryKey = 'id_jenis_berita';
    protected $fillable = ['nm_jenis_berita'];
    public $timestamps = false;
}
