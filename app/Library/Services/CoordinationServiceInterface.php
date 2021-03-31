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
     * @param $request string
     * @param $kias string
     *
     *
     */
    public function CoordinationList($request, $kias);

    /**
     *
     *  getCoordinationInfo
     * @param $request string
     * @param $kias string
     *
     *
     */
    public function CoordinationInfo($request, $kias);

    /**
     *
     *  getCoordinationInfo
     * @param $request string
     * @param $kias string
     *
     *
     */

    public function CoordinationService($request);

    public function DocRowList($request, $kias);

    /**
     *
     *  getCoordinationInfo
     * @param $request string
     * @param $kias string
     *
     *
     */

    public function attributeKeys();

    public function getCoordinationAttributes();

    public function getKVAttributes();

    public function AttachmentsService($request, $kias);

    /**
     *
     *  getCoordinationInfo
     * @param $request string
     * @param $kias string
     *
     *
     */
    public function AgreedCoordination($request, $kias);

    /**
     *
     *  getCoordinationInfo
     * @param $request string
     * @param $kias string
     *
     *
     */
    public function saveAttachmentService($request, $kias);

    /**
     *
     *  getCoordinationInfo
     * @param $request string
     * @param $kias string
     *
     *
     */
    public function sendNotifyService($request);

    /**
     *
     *  getCoordinationInfo
     * @param $request string
     *
     *
     */
    public function closeDecadeService($request);

    /**
     *
     *  getCoordinationInfo
     * @param $request string
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
    public function serviceCenterNotify($request);
    /**
     * @param $request string
     *
     */

}
