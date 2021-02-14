<?php

namespace Database\Factories;

use App\Models\Movie;
use Illuminate\Database\Eloquent\Factories\Factory;

class MovieFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Movie::class;
    private $genre = ['action', 'comedy', 'drama', 'racing'];

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'=> $this->faker->word(),
            'director' => $this->faker->name(),
            'imageUrl' => $this->faker->imageUrl(),
            'duration' => random_int(1, 500),
            'genre' =>$this->genre[random_int(0,3)],
            'release_date' => $this->faker->date(),
        ];
    }
}
