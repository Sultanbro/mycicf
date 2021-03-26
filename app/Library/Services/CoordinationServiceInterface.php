<?php


namespace App\Library\Services;


use App\Events\NewPost;
use App\Http\Controllers\NotificationController;


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
     * @param $request integer
     * @param $kias string
     *
     *
     */
    public function CoordinationList($request, $kias);

    /**
     *
     *  getCoordinationInfo
     * @param $request integer
     *@param $kias integer
     *
     *
     */
    public function CoordinationInfo($request, $kias);

    /**
     *
     *  getCoordinationInfo
     * @param $request integer
     *@param $kias integer
     *
     *
     */

    public function CoordinationService($request);

    public function DocRowList($request, $kias);
    /**
     *
     *  getCoordinationInfo
     * @param $request integer
     *@param $kias integer
     *
     *
     */

    public function attributeKeys();

    public function getCoordinationAttributes();

    public function getKVAttributes();

    public function AttachmentsService ($request, $kias);
    /**
     *
     *  getCoordinationInfo
     * @param $request integer
     *@param $kias integer
     *
     *
     */
    public function AgreedCoordination($request, $kias);
    /**
     *
     *  getCoordinationInfo
     * @param $request integer
     *@param $kias integer
     *
     *
     */
    public function saveAttachmentService($request, $kias);
    /**
     *
     *  getCoordinationInfo
     * @param $request integer
     *@param $kias integer
     *
     *
     */
    public function sendNotifyService($request);
    /**
     *
     *  getCoordinationInfo
     * @param $request integer
     *@param $kias integer
     *
     *
     */
    public function closeDecadeService($request);
    /**
     *
     *  getCoordinationInfo
     * @param $request integer
     *@param $kias integer
     *
     *
     */
    public function checkNotificationSended($isn, $no, $type);
    /**
     *
     *  getCoordinationInfo
     * @param $request integer
     *@param $kias integer
     *
     *
     */
    public function serviceCenterNotify($request);
}
