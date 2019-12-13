<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pembina extends Model
{
    protected $table = 'tb_pembina';
    protected $primaryKey = 'id_pembina';
    protected $fillable = ['nm_pembina','sambutan','','foto'];
    public $timestamps = false;
}
