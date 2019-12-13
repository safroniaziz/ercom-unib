<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model
{
    protected $table = 'tb_slide';
    protected $primaryKey = 'id_slide';
    protected $fillable = ['gambar','keterangan'];
    public $timestamps = false;
}
