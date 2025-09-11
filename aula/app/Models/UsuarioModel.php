<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioModel extends Model
{
    use HasFactory;

    protected $table = "tbusuario"; // tabela nova

    public $timestamps = false; // se não tiver created_at/updated_at
    protected $fillable = ['nomeUsuario', 'emailUsuario', 'senhaUsuario']; // campos que você quer preencher
}
