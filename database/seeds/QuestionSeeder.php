<?php

use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Question::truncate();
        \App\Answer::truncate();
        factory(App\Question::class, 10)->create()->each(function (App\Question $q) {
            factory(App\Answer::class, random_int(3, 7))->create()->each(function  (\App\Answer $a) use ($q) {
                $a->question_id = $q->id;
                $a->save();
            });
        });
    }
}
