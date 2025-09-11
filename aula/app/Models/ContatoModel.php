<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContatoModel extends Model
{
    use HasFactory;
    protected $table = "tbcontato";//nome da tabela

    public $timestamps = false; //pra não mostrar data e hora no banco uma coisa assim
	protected $fillable = ['nomeContato','emailContato','mensagemContato']; //fillable é tipo preenchivel, em seguida tem um vetor que mostra qual coluna vc quer preencher
}
