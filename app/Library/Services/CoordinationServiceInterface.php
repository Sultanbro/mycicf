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
     * @param $ISN string
     *
     */
    public function CoordinationList($ISN);

    /**
     *
     *
     *@param $docIsn string
     *
     */
    public function CoordinationInfo($docIsn);

    /**
     *
     * @param $DocISN string
     * @param $ISN string
     * @param $Solution string
     * @param $Remark string
     * @param $Resolution string
     *
     */
    public function CoordinationService($DocISN, $ISN, $Solution,$Remark, $Resolution);

    /**
     *
     * @param $class_isn
     * @param $doc_isn
     *
     */
    public function DocRowList($class_isn, $doc_isn);

    public function attributeKeys();

    public function getCoordinationAttributes();

    public function getKVAttributes();

    /**
     *
     *
     * @param $docIsn string
     *
     *
     */
    public function AttachmentsService($docIsn);

    /**
     *
     *
     * @param $ISN string
     *
     */
    public function AgreedCoordination($ISN);

    /**
     *
     *
     * @param $fileType
     * @param $isn string
     * @param $requestType string
     *
     *
     */
    public function saveAttachmentService($fileType, $isn, $requestType);

    /**
     *
     *
     * @param $users_rec string
     * @param $doc_no string
     * @param $doc_type string
     *
     */
    public function sendNotifyService($users_rec, $doc_no, $doc_type);

    /**
     *
     * @param $postText string
     *
     */
    public function closeDecadeService($postText);

    /**
     *
     *
     * @param $isn string
     * @param $type string
     * @param  $no string
     *
     */
    public function checkNotificationSended($isn, $no, $type);

    /**
     * @param $data
     *
     */
    public function serviceCenterNotify($data);

}
