<?php

namespace Tests\Unit;

use App\Library\Services\KiasServiceInterface;
use App\Library\Services\PostsService;
use PHPUnit\Framework\TestCase;
use App\Http\Controllers\DocumentManagementController;
use DB;

class DocumentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
//    public $postService = PostsService::class;
    public function testDocument()
    {
        $postService = app(PostsService::class);
        $result = $postService->getPosts2();
        $this->assertGreaterThanOrEqual(10, count($result));
    }

    public function testDocument2()
    {
        $postService = app(PostsService::class);
        $result = $postService->getPosts3();
        $this->assertEquals(608, count($result));
    }

    public function testDocument4()
    {
        // Возвращает количество должностей
        $postService = app(PostsService::class);
        $result = $postService->getDuty();
        $this->assertEquals(280, strlen($result));
    }

    public function testDocument5()
    {
        // Возвращает количество контрагентов
        $postService = app(PostsService::class);
        (array)$result = $postService->getCounterpartyType();
        $this->assertEquals(233, strlen($result));
    }
}
