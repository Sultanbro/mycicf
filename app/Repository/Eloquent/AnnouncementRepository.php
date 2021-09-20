<?php

namespace App\Repository\Eloquent;

use App\Announcement;
use App\Repository\AnnouncementRepositoryInterface;
use Illuminate\Database\Eloquent\Model;

class AnnouncementRepository extends BaseRepository implements AnnouncementRepositoryInterface
{
    /**
     * @var Model
     */
    protected $model;

    /**
     * AnnouncementRepository constructor.
     *
     * @param Announcement $model
     */
    public function __construct(Announcement $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

}
