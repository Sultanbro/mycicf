<?php
/**
 * Created by PhpStorm.
 * User: IAkbergen
 * Date: 23.04.2019
 * Time: 11:52
 */

namespace App\Library\Services;


interface KiasServiceInterface
{
    /**
     * Authenticate
     * @param $username string
     * @param $password string
     * @return mixed
     */
    public function authenticate($username, $password);

    /**
     * Autheticate with system credentials
     * @return mixed
     */
    public function authBySystem();
    /**
     * Получить уровень доступа для дерева подразделении
     * @param $ISN
     * @return mixed
     */
    public function getUpperLevel($ISN);

    /**
     * Получить информация про сотрудника
     * @param $ISN
     * @param $dateBeg
     * @param $dateEnd
     * @return mixed
     */
    public function getEmplInfo($ISN, $dateBeg, $dateEnd);

    /**
     * Получить список всех подразделении и сотрудников
     * @return mixed
     */
    public function getBranches();
}