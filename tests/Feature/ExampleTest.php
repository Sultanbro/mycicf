<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ExampleTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function getChiefsRequest()
    {
        $this->actingAs(\App\User::first());
        $response = $this->post('/recruiting/getChiefsRequest');

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
        if ($response->assertStatus(200)){
            echo("\nОтлично!\n\n");
        }
    }public function saveRecruitingData()
    {
        $this->actingAs(\App\User::first());
        $response = $this->post('/recruiting/saveRecruitingData');

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
        if ($response->assertStatus(200)){
            echo("\nОтлично!\n\n");
        }
    }public function getCandidatsDataRequest()
    {
        $this->actingAs(\App\User::first());
        $response = $this->post('/recruiting/getCandidatsDataRequest');

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
        if ($response->assertStatus(200)){
            echo("\nОтлично!\n\n");
        }
    }public function getResultRequest()
    {
        $this->actingAs(\App\User::first());
        $response = $this->post('/recruiting/getResultRequest');

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
        if ($response->assertStatus(200)){
            echo("\nОтлично!\n\n");
        }
    }public function getCandidatsDataManualRequest()
    {
        $this->actingAs(\App\User::first());
        $response = $this->post('/recruiting/getCandidatsDataManualRequest');

        $response
            ->assertStatus(200)
            ->assertJson([
                'created' => true,
            ]);
        if ($response->assertStatus(200)){
            echo("\nОтлично!\n\n");
        }
    }
//    public function getCandidatsDataRequest()
//    {
//        $this->actingAs(\App\User::first());
//        $response = $this->post('/recruiting/getCandidatsDataRequest');
//
//        $response->assertStatus(200)->getContent();
//    }public function getResultRequest()
//    {
//        $this->actingAs(\App\User::first());
//        $response = $this->post('/recruiting/getResultRequest');
//
//        $response->assertStatus(200)->getContent();
//    }public function getCandidatsDataManualRequest()
//    {
//        $this->actingAs(\App\User::first());
//        $response = $this->post('/recruiting/getCandidatsDataManualRequest');
//
//        $response->assertStatus(200)->getContent();
//    }
    public function testBasicTest()
    {
        $this->actingAs(\App\User::first());
        $response = $this->post('/recruiting/getChiefsRequest');

        $response->assertStatus(200)->getContent();
    }
}
