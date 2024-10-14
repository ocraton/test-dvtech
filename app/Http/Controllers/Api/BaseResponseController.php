<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BaseResponseController extends Controller
{
    
    public function sendResponse($result, $message, $code = 200)
    {
        $response = [
            'success' => true,
            'data' => $result,
            'message' => $message,
            'code' => $code,
        ];

        return response()->json($response, $code);
    }

    public function sendError($error = null, $errorMessages = null, $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $errorMessages,
            'code' => $code,
        ];

        if (! empty($error)) {
            $response['data'] = $error;
        }

        return response()->json($response, $code);
    }
}
