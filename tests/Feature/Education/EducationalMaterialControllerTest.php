<?php

namespace Tests\Feature\Education;

use App\Http\Controllers\Api\EducationalMaterialController;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EducationalMaterialControllerTest extends TestCase
{
    public function testEducationMaterial()
    {
        $store = $this->json('POST', '/api/material', ['file' => UploadedFile::fake()->image('edinorog.jpg'), 'name' => 'Фото11', 'description' => 'Хорошая11', 'type' => 1]);

        Storage::disk('local')->assertExists($store['link']);

        $store->assertStatus(201);

        $index = $this->json('GET', '/api/material');

        $index->assertOk()
            ->assertJsonFragment([
                'link' => $store['link'],
            ]);

        $show = $this->json('GET', '/api/material/'.$store['id']);

        $show->assertOk()
            ->assertJsonFragment([
                'link' => $store['link'], 'name' => 'Фото11',
            ]);

        $update = $this->json('POST', '/api/material/'.$store['id'],  ['_method' => 'PUT', 'name' => 'Фото', 'description' => 'Хорошая', 'type' => 1]);

        $update->assertOk()
            ->assertJsonFragment(['name' => 'Фото', 'description' => 'Хорошая', 'type' => 1]);

        $destroy = $this->json('DELETE', '/api/material/'.$store['id']);

        Storage::disk('local')->assertMissing($store['link']);

        $destroy->assertOk();

    }
}
