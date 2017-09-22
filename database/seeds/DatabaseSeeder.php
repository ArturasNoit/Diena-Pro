<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(DishSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(DishSeeder::class);
    }
}
