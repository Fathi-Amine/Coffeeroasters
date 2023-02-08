<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plate>
 */
class PlateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'title'=>$this->faker->sentence(1),
            'img'=>$this->faker->image(),
            'category'=>$this->faker->word(),
            'price'=>$this->faker->numberBetween(1,20),
            'description'=>$this->faker->paragraph(5),
        ];
    }
}