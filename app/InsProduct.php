<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class InsProduct
 * @package App
 * @property string $product_name Название продукта
 * @property integer $product_isn ISN продукта
 * @property integer $product_class Класс страхования продукта
 * @property object $construction Атрибуты
 */
class InsProduct extends Model
{
    use SoftDeletes;
}
