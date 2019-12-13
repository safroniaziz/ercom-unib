<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class Prodi extends Model
{
    protected $table = 'tb_prodi';
    protected $fillable = ['id_prodi','nm_prodi'];
    protected $primaryKey = 'id_prodi';
    public $timestamps = false;
}