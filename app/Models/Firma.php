<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Firma extends Model
{
    use HasFactory;
    protected $table = 'firma';
    protected $fillable =
        [
            'nume',
            'CUI',
            'adresa',
            'data_infiintare',
            'activitate',
        ];
}
