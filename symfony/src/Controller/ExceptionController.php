<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;
use App\Service\ApiService;

/**
 * Сustom exception controller
 */
class ExceptionController
{
    /**
     * Converts an Exception to a Response
     *
     * @param Request $request
     * @param \Exception|\Throwable $exception
     * @param DebugLoggerInterface|null $logger
     *
     * @throws \InvalidArgumentException
     *
     * @return ApiService::error
     */
    public function showAction(Request $request, $exception, DebugLoggerInterface $logger = null)
    {
        $code = isset($exception->getStatusCode) ? $exception->getStatusCode() : 400;
        $mes = $exception->getMessage();
        return ApiService::error($mes, $code);
    }
}
