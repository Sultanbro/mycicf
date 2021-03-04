<?php

namespace Tests;

use App\User;
use Hash;

trait WithUser {
    /**
     * @param $ISN
     * @return User
     */
    protected function getUser($ISN = self::ISN) {
        /**
         * @var $user User
         */
        $user = User::where('isn', '=', $ISN)->first();

        if ($user) {
            return $user;
        }

        $user = new User();
        $user->ISN = $ISN;
        $user->username = 'Test user';
        $user->password_hash = Hash::make('password');
        $user->level = 0;
        $user->short_name = 'test';
        $user->full_name = 'test';
        $user->session_id = 1;
        $user->dept_isn = '1';
        $user->save();

        return $user;
    }
}
