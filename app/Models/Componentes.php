<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Componentes extends Model
{
    use HasFactory;

    public function formatacaoDinheiroDecimal($valor){
        $tamanho = strlen($valor);
        $dados = str_replace(',', '.', $valor);
        if($tamanho <= 6){
            $dados = str_replace(',', '.', $valor);
        } else {
            if($tamanho >= 8 && $tamanho <= 10){
                $retiraVirgula = str_replace(',', '.', $valor);
                $sepraPorIndice = explode('.', $retiraVirgula);
                $dados = $sepraPorIndice[0] . $sepraPorIndice[1];
            }
        }

        return $dados;
    }
}
