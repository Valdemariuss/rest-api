<?php

namespace App\Controller;

use FOS\RestBundle\Controller\FOSRestController;
use App\Service\ApiService;

class DefaultController extends FOSRestController
{
    /**
     * Default route
     * @return ApiService::response
     */
    public function index()
    {
        $data = ['message' => 'Welcome to Rest API!'];
        return ApiService::response($data);
    }
}