<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
//        $categories = ['Politique', 'Culture', 'Santé', 'Sport', 'Économie'];

        $name = $this->faker->unique->word;

        return [
            'name' => $name,
            'alias' => Str::slug($name)
        ];
    }
}
