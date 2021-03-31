<?php


namespace App\Library\Services;

/**
 * Interface CoordinationServiceInterface
 *
 * @package App\Library\Services
 */

interface CoordinationServiceInterface
{

    /**
     * Получить список документов на согласование
     *
     *
     *
     *
     */
    public function CoordinationList($ISN);

    /**
     *
     *  getCoordinationInfo
     * @param $ISN integer
     *
     *
     *
     */
    public function CoordinationInfo($docIsn);

    /**
     *
     *  getCoordinationInfo
     * @param $docIsn string
     *
     *
     *
     */

    public function CoordinationService($DocISN, $ISN, $Solution,$Remark, $Resolution);

    public function DocRowList($class_isn, $doc_isn);

    /**
     *
     *  getCoordinationInfo
     * @param $class_isn string
     * @param $doc_isn integer
     *
     *
     */

    public function attributeKeys();

    public function getCoordinationAttributes();

    public function getKVAttributes();

    public function AttachmentsService($docIsn);

    /**
     *
     *  getCoordinationInfo
     * @param $docIsn string
     *
     *
     *
     */
    public function AgreedCoordination($ISN);

    /**
     *
     *  getCoordinationInfo
     * @param $ISN string
     *
     *
     *
     */
    public function saveAttachmentService($fileType, $isn, $requestType);

    /**
     *
     *  getCoordinationInfo
     * @param $fileType string
     * @param $isn string
     * @param $requestType string
     *
     *
     */
    public function sendNotifyService($users, $doc_no, $doc_type);

    /**
     *
     *  getCoordinationInfo
     * @param $users string
     *@param $doc_no string
     *@param $doc_type string
     *
     */
    public function closeDecadeService($postText);

    /**
     *
     *
     * @param $postText string
     *
     *
     */
    public function checkNotificationSended($isn, $no, $type);

    /**
     *
     *  getCoordinationInfo
     * @param $isn string
     * @param $type string
     * @param  $no string
     *
     */
    public function serviceCenterNotify($data);
    /**
     * @param $data string
     *
     */

}
