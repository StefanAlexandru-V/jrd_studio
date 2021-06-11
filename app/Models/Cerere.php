<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cerere extends Model
{
    use HasFactory;
    protected $table = 'cereri';

    protected $fillable = [
        'nume_client',
        'adresa_client',
        'serviciu',
        'mesaj',
        'telefon_client',
    ];


    public function user() {
        return $this->belongsTo(User::class, 'id_client');
    }

    public function service() {
        return $this->hasOne(Serviciu::class, 'id_cerere');
    }

    public function comanda() {
        return $this->hasOne(Comanda::class);
    }

}
