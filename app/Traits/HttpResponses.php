<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;

trait HttpResponses
{

    protected function success($data, string $status = 'success', string $message = '', int $code = 200): JsonResponse
    {
        return response()->json([
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ], $code);
    }

}