<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;
    protected $table = 'comenzi';
    protected $fillable = [
        'id_cerere',
        'id_client',
        'nume_client',
        'numar_cerere',
        'pret',
        'tip_comanda',
        'data_programare',
        'status'
    ];

    public function client() {
        return $this->belongsTo(User::class, 'id_client');
    }

    public function cerere() {
        return $this->belongsTo(Cerere::class);
    }
}
