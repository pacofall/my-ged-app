<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document>
 */
class DocumentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'name' => fake()->word(3),
                'description' => fake()->text(),
                'source' => fake()->company(),
                'access' =>fake()->randomElement([Document::ACCESS_PRIVATE,Document::ACCESS_PUBLIC]),

                'path' => 'doc/'.fake()->word(). "." . fake()->fileExtension(),

                'category_id' =>  function() {
                    return Category::query()->inRandomOrder()->first()->id;
                },

                'created_by' => function() {
                    return User::query()->inRandomOrder()->first()->id;
                }
        ];
    }
}
