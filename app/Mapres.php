<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapres extends Model
{
    protected $table = 'tb_mapres';
    protected $primaryKey = 'id_mapres';
    protected $fillable = ['npm','prestasi','foto'];
    public $timestamps = false;
}
