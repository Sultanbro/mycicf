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
        factory(App\Question::class, 50)->create();
    }
}
