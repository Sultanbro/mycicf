<?php

namespace Tests\Unit\Admin;

use App\CentcoinHistory;
use App\User;
use Illuminate\Database\Eloquent\Model;
use PHPUnit\Framework\TestCase;
use App\Library\CentcoinService;

class CentcoinTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        CentcoinHistory::truncate();
        $service = app(CentcoinService::class);

        $isns = [111, 222, 777];

        foreach ($isns as $isn) {
            $h = new CentcoinHistory();
            $h->type = 'Обнуление';
            $h->description = 'Начисление';
            $h->quantity = 100;
            $h->operation_type = 'add';
            $h->total = 0;
            $h->user_isn = 1111;
            $h->changed_user_isn = $isn;
            $h->save2();

            $this->assertEquals( 100, User::getBalance($isn));
        }

        $service->spendAll($isns);

        foreach ($isns as $isn) {
            $this->assertEquals( 0, User::getBalance($isn));
        }
    }
}
