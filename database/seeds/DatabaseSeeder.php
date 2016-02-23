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
        $this->call(UsersTableSeeder::class);
        $this->call(CoursesTableSeeder::class);
        $this->call(CourseSubjectsTableSeeder::class);
        $this->call(ActivitiesTableSeeder::class);
        $this->call(SubjectsTasksTableSeeder::class);
        $this->call(UserCoursesTableSeeder::class);
        $this->call(UserSubjectsTableSeeder::class);
        $this->call(UserTasksTableSeeder::class);
    }
}
