<?php

namespace App;

use http\Env\Request;
use Illuminate\Database\Eloquent\Model;

/**
 * Class StoreItem
 * @package App
 * @property string $name
 * @property integer $price
 * @property string $updated_by
 */

class StoreItem extends Model
{
  public function getPrice(Request $request)
  {
      $price = StoreItem::where('price',$request);
      return response($price);
  }
}
