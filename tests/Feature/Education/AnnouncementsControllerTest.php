<?php

namespace Tests\Feature\Education;

use App\Branch;
use App\Http\Controllers\Api\AnnouncementController;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AnnouncementsControllerTest extends TestCase
{

    public function testAnnonumcements()
    {
        \Illuminate\Support\Facades\Artisan::call('db:seed --class=DatabaseSeeder --env=testing');
        $user_id = Branch::find(8)->kias_id;

        $store = $this->json('POST', '/api/announcement', ['thema' => 'Почему', 'user_id' => $user_id, 'description' => 'Крутой', 'date_time' => '2022-02-03 12:00:00', 'online' => 1, 'space' => 2, 'type' => 1]);

        $store->assertStatus(201);

        $index = $this->json('GET', '/api/announcement');

        $index->assertOk()
            ->assertJsonFragment([
                'thema' => 'Почему', 'user_id' => $user_id,
            ]);

        $show = $this->json('GET', '/api/announcement/'.$store['id']);

        $show->assertOk()
            ->assertJsonFragment([
                'thema' => 'Почему', 'user_id' => $user_id,
            ]);

        $update = $this->json('POST', '/api/announcement/'.$store['id'],  ['_method' => 'PUT', 'thema' => 'Фото', 'user_id' => $user_id, 'description' => 'Хорошая', 'date_time' => '2022-02-15 12:00:00', 'online' => 1, 'space' => 2, 'site' => 'alfa.kz', 'type' => 2]);

        $update->assertOk()
            ->assertJsonFragment(['thema' => 'Фото', 'description' => 'Хорошая', 'type' => 2, 'date_time' => '2022-02-15 12:00:00',]);

        $destroy = $this->json('DELETE', '/api/announcement/'.$store['id']);

        $destroy->assertOk();
    }

}
