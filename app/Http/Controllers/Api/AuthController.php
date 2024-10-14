<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends BaseResponseController
{
    public function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        if ($validate->fails()) {

            return $this->sendError(null, $validate->errors()->first(), 422);

        }

        if (auth()->attempt(['username' => $request->username, 'password' => $request->password])) {

            $user = auth()->user();

            $data['token'] = $user->createToken($user->email)->plainTextToken;

            return $this->sendResponse($data, 'token retrieved successfully', 200);

        } else {

            return $this->sendError(null, 'not valid credential', 422);
        }
    }

    public function logout()
    {

        if (auth()->check()) {

            auth()->user()->tokens()->delete();

            return $this->sendResponse(null, 'Token Deleted');

        } else {

            return $this->sendResponse(null, 'No Authenticated User');

        }
    }
}
