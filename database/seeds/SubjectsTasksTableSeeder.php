<?php

use App\Models\Task;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class SubjectsTasksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $subjects = [
            'SQL',
            'MysSQL',
            'PLSQL',
            'MSSQL',
            'PHP',
            'Ruby On Rails',
            'CSS',
            'HTML',
            'Git',
            'Phyton',
            '.Net',
            'Javascript',
            'C',
            'C#',
            'Cisco',
            'COBOL',
            'Assembly Language',
            'Turbo C',
            'Java',
            'SASS',
            'Laravel'
        ];
        for ($y = 0; $y <= 20; $y++) {
            $subjectData = [
                'name' => $subjects[$y],
                'description' => $faker->paragraph(3)
            ];
            $id = Subject::create($subjectData)->id;
            for ($z = 1; $z <= 5; $z++) {
                $taskData = [
                    'subject_id' => $id,
                    'description' => $faker->paragraph(1)
                ];
                Task::create($taskData);
            }
        }
    }
}
