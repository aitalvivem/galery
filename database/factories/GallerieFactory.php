<?php

namespace Database\Factories;

use App\Models\Gallerie;
use Illuminate\Database\Eloquent\Factories\Factory;

class GallerieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Gallerie::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word();

        return [
            'nom_gallerie' => $name,
            'votes' => $this->faker->randomNumber(),
        ];
    }
}
