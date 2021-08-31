<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use function Deployer\isVeryVerbose;

class QuizTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    /** @test */
    public function testAllQuiz()
    {
        $response = $this->get('/api/quiz');

        $response->assertStatus(200);
    }
}
