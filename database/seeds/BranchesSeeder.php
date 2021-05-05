<?php

use Illuminate\Database\Seeder;

class BranchesSeeder extends Seeder {
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        \App\Branch::truncate();
        $branch = new \App\Branch();
        $branch->fullname = 'Developer';
        $branch->kias_parent_id = 0;
        $branch->kias_id = 5565;
        $branch->has_child = 0;
        $branch->verified = 0;
        $branch->duty = 0;
        $branch->birthday = \Illuminate\Support\Carbon::now()->addYears(30);
        $branch->save();

        factory(App\Branch::class, 500)->create();
    }
}
