<?php
use Illuminate\Database\Seeder;
use App\User;
use Faker\Factory as Faker;





class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      $faker = Faker::create();

      foreach(range (1, 10) as $x){
        $user = new User;
        $user->name = $faker->firstName;
        $user->surname = $faker->lastName;
        $user->phone = $faker->phoneNumber;
        $user->birthday = '2016-05-04';
        $user->email = $faker->email;
        $user->password = \Hash::make('demo');
        $user->address = $faker->streetAddress;
        $user->city = $faker->city;
        $user->save();
      }

      DB::table('users')->insert([
        'name' => 'admin',
        'surname' => 'Aminas',
        'phone' => '646656565656',
        'birthday' => '2016-05-04',
        'email' => 'admin@admin.lt',
        'password' => \Hash::make('testas'),
        'address' => '12345',
        'city' => 'Vilnius',
        'created_at' => new \DateTime(),
        'updated_at' => new \DateTime(),
        "isAdmin" => "1"
        ]);
    }
}