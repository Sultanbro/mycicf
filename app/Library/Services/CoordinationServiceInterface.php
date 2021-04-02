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
     * @param $params
     * @return mixed
     */
    public function CoordinationService($params);

    /**
     * @param $params
     * @return mixed
     */
    public function DocRowList($params);

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
     * @param $params
     * @return mixed
     */
    public function saveAttachmentService($params);

    /**
     * @param $params
     * @return mixed
     */
    public function sendNotifyService($params);

    /**
     * @param $postText
     * @return mixed
     */
    public function closeDecadeService($postText);

    /**
     * @param $params
     * @return mixed
     */
    public function checkNotificationSended($params);

    /**
     * @param $data
     * @return mixed
     */
    public function serviceCenterNotify($data);

}
