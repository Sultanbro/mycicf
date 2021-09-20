<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call(UserSeeder::class);
        $this->call(BranchesSeeder::class);
        $this->call(PostSeeder::class);
        $this->call(LikeSeeder::class);
        $this->call(CommentSeeder::class);
        $this->call(QuestionSeeder::class);
        $this->call(ScoreSeeder::class);
        $this->call(QuizSeeder::class);
        // $this->call(AnswerSeeder::class);
        Schema::enableForeignKeyConstraints();
    }
}
