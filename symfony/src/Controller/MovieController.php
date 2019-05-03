<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\FOSRestController;
use FOS\RestBundle\Controller\Annotations as Rest;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use App\Entity\Movie;
use App\Form\MovieType;
use App\Service\ApiService;

/**
 * Movie controller.
 * @Route("/api", name="api_")
 */
class MovieController extends FOSRestController
{
    /**
     * Lists all Movies.
     * @Rest\Get("/movies")
     *
     * @return ApiService::response
     */
    public function getMovieAction()
    {
        $repository = $this->getDoctrine()->getRepository(Movie::class);
        $movies = $repository->findall();
        return ApiService::response($movies);
    }

    /**
     * Create Movie.
     * @Rest\Post("/movie")
     *
     * @return ApiService::response | ApiService::error
     */
    public function postMovieAction(Request $request)
    {
        $movie = new Movie();
        $form = $this->createForm(MovieType::class, $movie);

        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();
            $res = [
                "status" => "ok",
                "movie" => $movie
            ];
            return ApiService::response($res, Response::HTTP_CREATED);
        }

        return ApiService::error( $form->getErrors() );
    }

    /**
     * Update Movie.
     * @Rest\Put("/movie/{id}")
     *
     * @return ApiService::response | ApiService::error
     */
    public function putMovieAction(int $id, Request $request)
    {
        $repository = $this->getDoctrine()->getRepository(Movie::class);
        $movie = $repository->find($id);
        $form = $this->createForm(MovieType::class, $movie);

        $data = json_decode($request->getContent(), true);
        $form->submit($data);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($movie);
            $em->flush();
            $movie = $repository->find($id);
            $res = [
                "status" => "ok",
                "movie" => $movie
            ];
            return ApiService::response($res, Response::HTTP_OK);
        }

        return ApiService::error( $form->getErrors() );
    }

    /**
     * Delete Movie.
     * @Rest\Delete("/movie/{id}")
     *
     * @return ApiService::response | ApiService::error
     */
    public function deleteMovieAction(int $id)
    {
        $repository = $this->getDoctrine()->getRepository(Movie::class);
        $movie = $repository->find($id);

        if($movie){
            $em = $this->getDoctrine()->getManager();
            $em->remove($movie);
            $em->flush();
            $res = [
                "status" => "ok",
                "message" => ("Delete movie id - ".$id)
            ];
            return ApiService::response($res, Response::HTTP_OK);
        }

        return ApiService::error( ["message" => ("Movie id -". $id ." not found")], Response::HTTP_NOT_FOUND );
    }
}
