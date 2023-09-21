<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Box>
 */
class BoxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'price' => $this->faker->randomFloat(2, 0, 99.99),
            'status' => 1,
            'link' => str_replace(' ', '-', strtolower($this->faker->name)),
            'image_path' => 'https://images.steamcdn.io/csgonet/cases/JACKPOT-Case-Mycsgo.png',
        ];
    }
}
