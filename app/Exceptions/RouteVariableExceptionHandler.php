<?php

namespace App\Exceptions;

use Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RouteVariableExceptionHandler extends Exception
{
    public function render($request, Exception $exception)
    {
        return 21212312;
        if ($exception instanceof NotFoundHttpException) {
            // 自定义API错误响应
            return response()->json(['error' => '找不到路由'], 400);
        }
    }
}
