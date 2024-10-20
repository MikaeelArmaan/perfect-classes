<?php

namespace Database\Factories;

use App\Models\image;
use Illuminate\Database\Eloquent\Factories\Factory;

class imageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => $this->faker->word,
        'image' => $this->faker->word,
        'title' => $this->faker->word,
        'subtitle' => $this->faker->word,
        'description' => $this->faker->word,
        'parent_id' => $this->faker->randomDigitNotNull
        ];
    }
}
