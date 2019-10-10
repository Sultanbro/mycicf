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

    /**
     * Получить вложение из документа/договора/контрагента
     * @return mixed
     */
    public function getAttachmentData($refisn, $isn, $pictType);

    /**
     * Получить список всех листов согласования по ISN
     * @param $ISN
     * @return mixed
     */
    public function myCoordinationList($ISN);

    /**
     * Получить информацию о листе согласовании
     * @param $docIsn
     * @return mixed
     */
    public function getCoordination($docIsn);

    /**
     * Отправка ответа на лист согласования
     * @param $DocISN
     * @param $EmplISN
     * @param $Solution
     * @return mixed
     */
    public function setCoordination($DocISN, $EmplISN, $Solution, $Remark);

    /**
     * Получение списка прикреплении
     * @param $docIsn
     * @return mixed
     */
    public function getAttachmentsList($docIsn);
}