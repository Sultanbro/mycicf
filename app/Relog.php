<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Relog extends Model
{
    const STATUS_ACCEPTED = 'accepted';
    const STATUS_PENDING = 'pending';
    const STATUS_FAILED = 'failed';

}
