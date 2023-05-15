<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $file = Storage::files('public/images');
        $fKey = Category::pluck('id');


        return [
            'name' =>$this->faker->streetName(),
            'description' =>$this->faker->text(10),
            'price' =>$this->faker->numberBetween(30, 80) * 100,
            'images' =>$this->faker->randomElement($file),
            'reference' =>$this->faker->bothify('??###???#?##????'),
            'visibility' =>$this->faker->randomElement(['Non publié', 'Publié']),
            'size' =>$this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
            'state' =>$this->faker->randomElement(['En solde', 'Standard']),
            'category_id' =>$this->faker->randomElement($fKey),

        ];
    }
}
