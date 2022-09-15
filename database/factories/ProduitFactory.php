<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProduitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->word(),
            'prix' => $this->faker->numberBetween(1, 10),
            'quantite' => $this->faker->numberBetween(1, 20),
            'recette_id' => $this->faker->numberBetween(1, 10),
            'unite_id' => $this->faker->numberBetween(1, 8)
        ];
    }
}
