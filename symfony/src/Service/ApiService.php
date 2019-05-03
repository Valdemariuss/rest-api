<?php

namespace App\Service;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\View\View;

class ApiService
{
    /**
     * Success response
     * @param object|array         $data
     * @param string|number        $code
     * @return ApiService::response
     */
    public function response($data, $code = Response::HTTP_OK)
    {
        $res = [];
        $res["timestamp"] = time();
        $res["code"] = $code;
        $res["payload"] = $data;
        return View::create($res, $code, []);
    }

    /**
     * Response error
     * @param string               $mes
     * @param string|number        $code
     * @return ApiService::response
     */
    public function error($mes, $code = Response::HTTP_BAD_REQUEST, $info = null)
    {
        $res = [];
        $res["timestamp"] = time();
        $res["code"] = $code;
        $res["error"] = [];
        $res["error"]["message"]= $mes;
        if($info) {
            $res["error"]["payload"]= $info;
        }
        return View::create($res, $code, []);
    }
}