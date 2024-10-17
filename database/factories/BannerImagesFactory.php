<?php

namespace Database\Factories;

use App\Models\BannerImages;
use Illuminate\Database\Eloquent\Factories\Factory;

class BannerImagesFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = BannerImages::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'banner_id' => $this->faker->randomDigitNotNull,
        'image' => $this->faker->text,
        'url' => $this->faker->text,
        'title' => $this->faker->word,
        'description' => $this->faker->text
        ];
    }
}
