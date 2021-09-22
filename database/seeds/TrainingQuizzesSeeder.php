<?php

use Illuminate\Database\Seeder;

class TrainingQuizzesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\TrainingQuiz::class, 15)->create();
    }
}
