<?php

namespace Database\Factories;

use App\Models\Photo;
use Illuminate\Database\Eloquent\Factories\Factory;

class PhotoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Photo::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = $this->faker->word();

        return [
            'nom_file' => $name,
            'nom_thumb' => $name,
            'titre_photo' => $name,
            'votes' => $this->faker->randomNumber(),
            'gallerie_id'=> $this->faker->randomDigitNotNull(),
        ];
    }
}
