<?php

namespace App\Controller;

use FOS\RestBundle\Util\ExceptionValueMap;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpExceptionInterface;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

/**
 * Сustom exception controller
 */
class ExceptionController
{
    /**
     * Converts an Exception to a Response
     *
     * @param Request                   $request
     * @param \Exception|\Throwable     $exception
     * @param DebugLoggerInterface|null $logger
     *
     * @throws \InvalidArgumentException
     *
     * @return Response
     */
    public function showAction(Request $request, $exception, DebugLoggerInterface $logger = null)
    {
        $code = $exception->getStatusCode($exception);
        return new Response(
            json_encode(
                ['error' => $exception->getMessage(), 'code'=>$code],
                JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES
            ),
            $code,
            ['Content-type' => 'application/json']
        );
    }
}
