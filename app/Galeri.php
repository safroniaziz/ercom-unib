<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    protected $table = 'tb_galeri';
    protected $primaryKey = 'id_galeri';
    protected $fillable = ['id_galeri','id_kegiatan','foto'];
    public $timestamps = false;
}
