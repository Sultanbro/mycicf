<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

/**
 * Class Permissions
 * @property integer $user_isn ISN таргета
 * @property integer $permission_id ID уровня доступа
 * @property integer $changer ISN пользователя
 * @package App
 */
class Permissions extends Model
{
    use SoftDeletes;

    public $user;
    const ACTION_NEW = 'new';
    const ACTION_UPDATE = 'update';
    const ACTION_DELETE = 'delete';

    const ROLE_SUPERADMIN = 1;
    const ROLE_PARSE = 2;
    const ROLE_OTDELKADROV = 3;
    const ROLE_WND = 4;
    const ROLE_MODERATOR = 5;
    const ROLE_SENATE = 6;
    const ROLE_READING_CLUB = 7;
    const ROLE_PRODUCTS = 7;
    const ROLE_CLAIMS = 8;

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    public function hasPermission($user){
        $data = self::where('user_isn', $user->ISN)->get();
        dd($data);
    }

    public function getPermissionLabel(){
        return Dictionary::findOrFail($this->permission_id)->name;
    }

    public function save(array $options = [])
    {
        $this->changer = Auth::user()->ISN;
        return parent::save($options); // TODO: Change the autogenerated stub
    }

    public function getSuperUsersArray(){

    }

    public function checkUser($roles){
        array_push($roles, Permissions::ROLE_SUPERADMIN);
        $data = Permissions::whereIn('permission_id', $roles)
            ->where('user_isn',Auth::user()->ISN)
            ->first();
        return $data === null ? false : true;
    }
}
