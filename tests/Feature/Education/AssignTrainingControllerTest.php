<?php

namespace Tests\Feature\Education;

use App\Branch;
use App\Http\Controllers\Api\AnnouncementController;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AssignTrainingControllerTest extends TestCase
{

    public function testAnnonumcements()
    {
        \Illuminate\Support\Facades\Artisan::call('db:seed --class=DatabaseSeeder --env=testing');
        $user_id = Branch::find(8)->kias_id;

        $store = $this->json('POST', '/api/assign/training', ['kias_id' => 5003, 'training_programs_id' => [ 1 => 7 ] , 'date_start' => '2023.10.20', 'date_end' => '2023.12.20',]);

        $store->assertstatus(201);

        $index = $this->json('GET', '/api/assign/training');

        $index->assertOk()
            ->assertJsonFragment([
                'date_start' => '2023.10.20', 'date_end' => '2023.12.20', 'kias' => ['kias_id' => 5003],
            ]);

        $show = $this->json('GET', '/api/assign/training/'.$store['id']);

        $show->assertOk()
            ->assertJsonFragment([
                'id' => $store['id'], 'date_start' => '2023.10.20', 'date_end' => '2023.12.20', 'kias' => ['kias_id' => 5003],
            ]);

        $update = $this->json('POST', '/api/assign/training/'.$store['id'],  ['_method' => 'PUT', 'date_start' => '2023.10.21', 'date_end' => '2023.12.21',]);

        $update->assertOk()
            ->assertJsonFragment(['date_start' => '2023.10.21', 'date_end' => '2023.12.21',]);

        $destroy = $this->json('DELETE', '/api/assign/training/'.$store['id']);

        $destroy->assertOk();
    }

}
