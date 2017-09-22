<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Dish;

class DishSeeder extends Seeder
{
  protected $dish;
  protected $faker;

  public function __construct(Faker $faker, Dish $dish) {
    $this->dish = $dish;
    $this->faker = $faker;
  }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = $this->faker->create();
      foreach (range(1, 20) as $dish) {
        $this->dish->create(
          [
            'title' => $faker->name(),
            'description' => $faker->sentence(200),
            'image_url' => $faker->imageUrl(300,400, 'food'),
            'price' => $faker->numberBetween(1, 50)
            ]
          );
      }
    }
}
