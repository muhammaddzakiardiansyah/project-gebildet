<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'judul' => $this->faker->sentence(2,5),
            'slug' => $this->faker->slug(),
            'excrpt' => $this->faker->paragraph(),
            // 'caption' => $this->faker->paragraph(mt_rand(10,15)),
            'caption' => collect($this->faker->paragraph(mt_rand(5,10)))
                      ->map(fn($p) => "<p>$p</p>")
                      ->implode(' '),
            'category_id' => mt_rand(1,4),
            'user_id' => mt_rand(1,3)

        ];
    }
}
