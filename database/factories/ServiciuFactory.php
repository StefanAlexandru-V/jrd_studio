<?php

namespace Database\Factories;

use App\Models\Serviciu;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ServiciuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Serviciu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'titlu' => 'Serviciu' . rand(0, 100),
            'detalii' => 'TEST OK',
            'pret_orientativ' => rand(0, 100),
            'evidentiat' => 1,
        ];
    }

}
