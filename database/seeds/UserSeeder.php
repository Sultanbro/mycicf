<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\User::truncate();

        $user = new \App\User();
        $user->ISN = '5565';
        $user->username = 'Developer';
        $user->password_hash = '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi'; // password
        $user->level = '55';
        $user->short_name = 'Developer';
        $user->full_name = 'Developer';
        $user->session_id = 1;
        $user->dept_isn = '55';
        $user->save();

        factory(App\User::class, 200)->create();
    }
}
