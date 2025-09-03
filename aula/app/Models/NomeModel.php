<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NomeModel extends Model
{
    use HasFactory;

    protected $table = "tbusuario";

    public $timestamps = false; 
	protected $fillable = ['nomeUsuario'];
}
