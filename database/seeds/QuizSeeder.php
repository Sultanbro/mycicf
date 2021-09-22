<?php

use Illuminate\Database\Seeder;

class QuizSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Quiz::class, 10)->create()->each(function (App\Quiz $quiz) {
            factory(App\QuizQuestion::class, 10)->create()->each(function (App\QuizQuestion $q) use ($quiz) {
                $q->quiz_id = $quiz->id;
                $q->save();
                factory(App\QuizAnswers::class, 4)->create()->each(function (\App\QuizAnswers $a) use ($q) {
                    $a->question_id = $q->id;
                    $a->save();
                });
            });
        });
    }
}
