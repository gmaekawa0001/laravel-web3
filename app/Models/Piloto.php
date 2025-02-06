<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Equipe;

class Piloto extends Model
{
    protected $table = "piloto";

    protected $orderBy = "nome";
    protected $sql = "SELECT p.*, e.nome AS equipe FROM Piloto p JOIN equipe e ON e.id = p.equipe_id ORDER BY nome, id";

    public function equipe()
        {
            return $this->belongsTo(Equipe::class, 'equipe_id');
        }

        public $timestamps = false;
}
