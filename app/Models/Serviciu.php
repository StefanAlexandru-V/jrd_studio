<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Serviciu extends Model
{
    use HasFactory;

    protected $table = 'servicii';
    protected $fillable = [
        'titlu',
        'detalii',
        'pret_orientativ',
        'evidentiat',
        'imagine',
    ];

    public function cerere() {
        return $this->belongsTo(Cerere::class, 'id_serviciu');
    }
}
