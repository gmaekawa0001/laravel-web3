<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    protected $table = "equipe";
      protected $orderBy = "nome";

      public $timestamps = false;

}
