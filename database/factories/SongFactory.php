<?php

namespace Database\Factories;

use App\Models\Song;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    protected $model = Song::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->sentence(),
            'url' => $this->faker->imageUrl(55, 55, 'animals'),
            'artist_name' => $this->faker->name(),
            'duration' => $this->faker->numberBetween(60, 240)
        ];
    }
}
