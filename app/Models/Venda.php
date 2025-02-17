<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Venda extends Model
{
    use HasFactory;
    protected $table = 'venda';
    public $timestamps = false;
    protected $casts = [
        'data' => 'datetime:Y-m-d',
    ];


    public function itens(): HasMany
    {
        return $this->hasMany(Item::class);
    }
}
