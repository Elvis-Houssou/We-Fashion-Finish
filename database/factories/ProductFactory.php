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
        $category_id = $this->faker->randomElement(Category::pluck('id'));

        switch ($category_id) {
            case 1:
                $folder = 'hommes';
                break;
            case 2:
                $folder = 'femmes';
                break;
            // Ajoutez des cas supplémentaires pour chaque catégorie que vous souhaitez prendre en charge
            default:
                $folder = 'autres';
        }

        $file = File::files(storage_path("app/public/images/$folder"));
        $newFile = array_map(function($file){
            return $file->getFilename();
        }, $file);

        return [
            'name' =>$this->faker->streetName(),
            'description' =>$this->faker->text(10),
            'price' =>$this->faker->numberBetween(30, 80) * 100,
            'images' =>$this->faker->randomElement($newFile),
            'reference' =>$this->faker->bothify('??###???#?##????'),
            'visibility' =>$this->faker->randomElement(['Non publié', 'Publié']),
            'size' =>$this->faker->randomElement(['XS', 'S', 'M', 'L', 'XL']),
            'state' =>$this->faker->randomElement(['En solde', 'Standard']),
            'category_id' => $category_id,
        ];

    }
}
