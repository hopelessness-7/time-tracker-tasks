<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;

class MainController extends Controller
{
    /**
     * success response method.
     */
    public function sendResponse(mixed $result, string $message = 'request completed successfully', int $code = 200): JsonResponse
    {
        $response = [
            'data'    => $result,
            'message' => $message,
            'code' => $code
        ];

        return response()->json($response, $code);
    }

    /**
     * return error response.
     */
    public function sendError($error, $code = 404): JsonResponse
    {
        $response = [
            'errors' => [
                'error' => $error,
                'code' => $code
            ],
        ];

        return response()->json($response, $code);
    }

    public function handleRequest($callback)
    {
        try {
            return $this->sendResponse($callback());
        } catch (\Exception $e) {
            return $this->sendError($e->getMessage(), 500);
        }
    }
}
