<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $faker = Faker\Factory::create();

        $users = ['Jason', 'Karl', 'Chris', 'Allan', 'Sheca', 'Aldrin'];
        foreach($users as $user) {
            $usersData[] = [
                'name' => $user,
                'email' => strtolower($user) . '@doe.com',
                'password' => bcrypt('userpass'),
                'type' => User::TYPE_TRAINEE,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        $supervisors = ['Kazunari', 'Ronald', 'Grace', 'Melody', 'Lyle'];
        foreach($supervisors as $supervisor) {
            $usersData[] = [
                'name' => $supervisor,
                'email' => strtolower($supervisor) . '@doe.com',
                'password' => bcrypt('userpass'),
                'type' => User::TYPE_SUPERVISOR,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        // Additional users
        for($i = 12; $i < 51; $i++) {
            $usersData[] = [
                'name' => $faker->name,
                'email' => $faker->userName. '@doe.com',
                'password' => bcrypt('userpass'),
                'type' => User::TYPE_TRAINEE,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ];
        }

        User::insert($usersData);
    }
}
