<?php
/**
 * My.cic.kz
 * User: Altynbek
 */

namespace App\Helpers;


class Helper
{
    /**
     * Преобразование объекта SimpleXML в массив
     *
     * @param $xmlObject
     *
     * @return mixed
     */
    public static function simpleXmlToArray($xmlObject)
    {
        $xmlObject = json_decode(json_encode($xmlObject), true);
        if (empty($xmlObject)) {
            return [];
        }

        if (!isset($xmlObject['row'][0])) {
            $xmlArray['row'][] = $xmlObject['row'];

            return $xmlArray;
        }

        return $xmlObject;
    }
}
