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
     * @param $ISN
     * @return mixed
     */
    public function CoordinationList($ISN);

    /**
     * @param $docIsn
     * @return mixed
     */
    public function CoordinationInfo($docIsn);

    /**
     * @param $DocISN
     * @param $ISN
     * @param $Solution
     * @param $Remark
     * @param $Resolution
     * @return mixed
     */
    public function CoordinationService($DocISN, $ISN, $Solution,$Remark, $Resolution);

    /**
     * @param $class_isn
     * @param $doc_isn
     * @return mixed
     */
    public function DocRowList($class_isn, $doc_isn);

    /**
     * @return mixed
     */
    public function attributeKeys();

    /**
     * @return mixed
     */
    public function getCoordinationAttributes();

    /**
     * @return mixed
     */
    public function getKVAttributes();

    /**
     * @param $docIsn
     * @return mixed
     */
    public function AttachmentsService($docIsn);

    /**
     * @param $ISN
     * @return mixed
     */
    public function AgreedCoordination($ISN);

    /**
     * @param $fileType
     * @param $isn
     * @param $requestType
     * @return mixed
     */
    public function saveAttachmentService($fileType, $isn, $requestType);

    /**
     * @param $users_rec
     * @param $doc_no
     * @param $doc_type
     * @return mixed
     */
    public function sendNotifyService($users_rec, $doc_no, $doc_type);

    /**
     * @param $postText
     * @return mixed
     */
    public function closeDecadeService($postText);

    /**
     * @param $isn
     * @param $no
     * @param $type
     * @return mixed
     */
    public function checkNotificationSended($isn, $no, $type);

    /**
     * @param $data
     * @return mixed
     */
    public function serviceCenterNotify($data);

}
