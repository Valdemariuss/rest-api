<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\User;
use App\Service\ApiService;

/**
 * User controller.
 * @Route("/api", name="api_")
 */
class UsersController extends FOSRestController
{
    /**
     * Lists all Users.
     * @Rest\Get("/users")
     * @return ApiService::response
     */
    public function getAction()
    {
        $repository = $this->getDoctrine()->getRepository(User::class);
        $users = $repository->findall();
        return ApiService::response($users);
    }
}