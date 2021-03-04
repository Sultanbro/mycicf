<?php

namespace Tests\Feature\Site;

use App\Branch;
use App\Post;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\FeatureTestBase;
use Tests\WithUser;

class GetBirthdaysTest extends FeatureTestBase {
    use WithFaker, WithUser;

    protected $description = 'Получаем список дней рождения';

    public const ISN = '1144';
    /**
     * @var Post
     */
    private $post;

    /**
     * @var Branch
     */
    private $branch;

    /**
     * @var Carbon
     */
    private $date;

    public function __construct($name = null, array $data = [], $dataName = '') {
        parent::__construct($name, $data, $dataName);

        $this->date = Carbon::createFromDate(2020, 03, 01);
    }

    public function getRouteName() {
        return 'getBirthdays';
    }

    public function getMeasureName() {
        return 'Get Birthdays Test';
    }

    protected function prepare() {
        $this->getUser();
        $this->branch = new Branch();
        $this->branch->fullname = 'Test user';
        $this->branch->kias_id = self::ISN;
        $this->branch->kias_parent_id = 0;
        $this->branch->has_child = false;
        $this->branch->verified = true;
        $this->branch->duty = 1;
        $this->branch->birthday = $this->date->addDay();
        $this->branch->save();
    }

    public function handle() {
        $response = $this->post($this->route, [
            'd' => $this->date->day,
            'm' => $this->date->month,
        ]);
        $array = collect($response->json('birthdays'));
        $user = $array->first(function ($entry) {
            return $entry['ISN'] === self::ISN;
        });

        // TODO Обработать данные

        $response->assertStatus(200);
        self::assertGreaterThan(0, $array->count());
    }

    public function cleanup() {
        $this->branch->delete();
    }
}
