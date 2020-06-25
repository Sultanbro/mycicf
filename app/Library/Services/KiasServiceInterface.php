<?php
namespace App\Library\Services;

/**
 * Interface KiasServiceInterface
 * @package App\Library\Services
 * @property string $_sId KiasSessionId
 */
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
    public function setCoordination($DocISN, $EmplISN, $Solution, $Remark, $Resolution);

    /**
     * Получение списка прикреплении
     * @param $docIsn
     * @return mixed
     */
    public function getAttachmentsList($docIsn);

    /**
     * Получить список фотографии сотрудника по дате обновления
     * @param $date
     * @return mixed
     */
    public function getEmplImagesByDate($date);

    /**
     * Получить мотивацию сотрудников продающих подразделении
     * @param $isn
     * @param $begin
     * @param $end
     * @return mixed
     */
    public function getEmplMotivation($isn, $begin);

    /**
     * Получить отчет продавца
     * @param $dateBeg
     * @param $dateEnd
     * @param $emplIsn
     * @return mixed
     */
    public function GetInfoUser($dateBeg, $dateEnd, $emplIsn);

    /**
     * Получить рейтинг продавца
     * @param $isn
     * @param $begin
     */
    public function getEmplRating($isn, $begin);

    /**
     * Получить печатную форму документа
     * @param $isn
     * @param $template
     * @param $classId
     * @return mixed
     */
    public function getPrintableDocument($isn, $template, $classId);

    /**
     * Получить список документов на согласовании
     * @param $ISN
     * @return mixed
     */
    public function getCoordinationCount($ISN);

    /**
     * Получить список доп атрибутов экспресс котировок
     * @param $product ISN продукта
     * @return mixed
     */
    public function getExpressAttributes($product);

    /**
     * Получить список объектов полной котировки
     * @param $product ISN продукта
     * @return mixed
     */
    public function getFullObject($product);

    /**
     * Сделать расчет полной котироки
     * @param $order параметры котировки
     * @return mixed
     */
    public function calcFull($order);

    /**
     * Сохранение прикрплений в киас
     * @param $refisn int исн документа
     * @param $type
     * @param $name string название файла
     * @param $data
     * @return SimpleXMLElement
     */
    public function saveAttachment($refisn, $name, $file, $type = 'J');

    /**
     * Получить чайлды из справочника
     * @param $parent ParentISN
     * @return mixed
     */

    public function getDictiList($parent);

    public function getSubject($firstName, $lastName, $patronymic, $iin);

    public function expressCalculator($ISN, $SubjISN, $addAttr, $nshb);
}