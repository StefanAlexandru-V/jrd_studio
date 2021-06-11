<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    use HasFactory;
    protected $table = 'facturi';
    protected $fillable = [
        'nume_client',
        'adresa_client',
        'id_client',
        'id_comanda',
        'serviciu',
        'suma',
        'moneda',
        'data_incheiere',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(User::class, 'id_client');
    }

    public function comanda() {
        return $this->hasOne(Comanda::class, 'id_comanda');
    }
}
