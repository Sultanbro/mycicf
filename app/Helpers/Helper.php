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
        $xmlArray = [];
        foreach ($xmlObject as $key => $value) {
            if ($key == 'row') {
                if (empty($xmlObject['row'][0])) {
                    $xmlArray[$key][] = $xmlObject['row'];
                    continue;
                }
            }
            $xmlArray[$key] = $value;
        }

        return $xmlArray;
    }
}
