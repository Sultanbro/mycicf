<?php
/**
 * Created by PhpStorm.
 * User: IAkbergen
 * Date: 12.04.2019
 * Time: 17:14
 */

namespace App\Library\Services;
use Exception;
use Faker\Guesser\Name;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use SoapClient;
use SimpleXMLElement;
use App\Library\Services\KiasServiceInterface;


class Kias implements KiasServiceInterface
{
    public $username;
    public $password;
    public $client;
    public $request;
    public $_sId;
    const APP_ID = 868281;
    public $tries = 0;

    /**
     * @var string Ссылка на сервис
     */
    public $url;

    /**
     * @var string ID сессии КИАС
     */
    private $_sid;

    public function init($session)
    {
        $this->url = env('KIAS_URL');
        $this->getClient();
        $this->_sId = $session;

    }

    /**
     * Получить Soap-клиент
     * @return SoapClient
     */
    public function getClient()
    {
        if (!$this->client) {
            $this->client = new SoapClient($this->url, [
                'cache_wsdl' => WSDL_CACHE_NONE,
                'trace' => 1,
            ]);
        }

        return $this->client;
    }

    public function request($name, $params = []){
        $xml = new SimpleXMLElement(
            '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'
            . $this->client->ExecProc([
                'pData' => $this->createRequestData($name, $params),
            ])->ExecProcResult->any
        );

//        if ($name!='GetDictiList' && $name!='User_CicHelloSvc' && $name!='User_CicGetAgrObjectClassList' && $name!='Auth') {
            $t     = microtime(true) + 6 * 60 * 60;
            $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
            $d     = new \DateTime(date('Y-m-d H:i:s.' . $micro, $t));
            $date  = $d->format('d-m-Y_H-i-s-u');
            file_put_contents(
                storage_path() ."/kias_logs/{$date}_kias_agent_result_{$name}_.xml",
                $xml->asXml()
            );
//        }

        if (isset($xml->error)) {
            if (isset($xml->error->code) && $xml->error->code == '001') {
                $response = $this->authenticate(Auth::user()->username, Auth::user()->password_hash);
                if($response->error){
                    Auth::logout();
                }else{
                    $User = Auth::user();
                    $User->session_id = $response->Sid;
                    $User->save();
                    return $this->request($name, $params);
                }
            }
        }

        return $xml->result ?? $xml;
    }

    public function createRequestData($name, $params)
    {
        $params['Sid'] = $this->_sId;
        if($name == 'Auth'){
            unset($params['Sid']);
        }
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="utf-8"?><data></data>');
        $request = $xml->addChild('request');
        $request->addChild('reqName', $name);
        $request->addChild('AppId', static::APP_ID);
        $request->addChild('RequestIp', $_SERVER['REMOTE_ADDR'] ?? '1');
        $request->addChild('UserAgent', $_SERVER['HTTP_USER_AGENT'] ?? '1');
        self::addXmlChildren($request->addChild('params'), $params);
//        if($name != 'GetDictiList' && $name != 'User_CicHelloSvc' && $name != 'User_CicGetAgrObjectClassList' && $name != 'Auth'){
            $t = microtime(true) + 6 * 60 * 60;
            $micro = sprintf("%06d", ($t - floor($t)) * 1000000);
            $d = new \DateTime(date('Y-m-d H:i:s.' . $micro, $t));
            $date = $d->format('d-m-Y_H-i-s-u');
            file_put_contents(
                storage_path() . "/kias_logs/" . $date . "_kias_agent_" . $name . "_.xml",
                $xml->asXML()
            );
//        }
        return $xml->asXML();
    }

    protected static function addXmlChildren($object, $params, $parentName = null)
    {
        foreach ($params as $paramName => $paramValue) {
            if (is_array($paramValue)) {
                $integerArray = isset($paramValue[0]);
                static::addXmlChildren(
                    ($integerArray)
                        ? $object
                        : $object->addChild((is_int($paramName) && $parentName)
                        ? $parentName : $paramName
                    ),
                    $paramValue,
                    $integerArray ? $paramName : null
                );
            } else {
                $object->addChild($paramName, $paramValue);
            }
        }
    }

    public function authenticate($username, $password){
        return $this->request('Auth', [
            'Name' => $username,
            'Pwd' => $password,
        ]);
    }

    public function authBySystem(){
        $response = $this->request('Auth', [
            'Name' => env('KIAS_LOGIN'),
            'Pwd' => hash('sha512', env('KIAS_PASSWORD')),
        ]);
        if($response->error){
            throw new Exception('Authentication failed', '419');
        }

        $this->_sId = $response->Sid;
    }

    public function getBranches(){
        return $this->request('User_CicGetUserList',[
            'number' => 1,
        ]);
    }

    public function getUpperLevel($ISN){
        return $this->request('User_CicGetUserLVL', [
            'EmplISN' => $ISN,
        ]);
    }

    public function getEmplInfo($ISN, $dateBeg, $dateEnd){
        return $this->request('User_CicGetEmplInfo', [
            'DateBeg' => $dateBeg,
            'DateEnd' => $dateEnd,
            'EmplISN' => $ISN,
        ]);
    }
}