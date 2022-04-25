<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class Authentication
{
    private $data;
    private $user;

    public function __construct($requestData, $user)
    {
        $this->data = $requestData;
        $this->user = $user;
    }

    public function authenticateRequest()
    {
        return $this->sanctumAuthenticate();
    }


    private function sanctumAuthenticate()
    {
        $validator = Validator::make($this->data, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(!$validator->fails())
        {
            //attempt to login user
            if(Auth::attempt([
                'email' => $this->data['email'],
                'password'=> $this->data['password']
            ]))
            {
              //  return Auth::user()->createToken('sanctum')->plainTextToken;
                return response()->json(['token' => Auth::user()->createToken('sanctum')->plainTextToken ], 200);
            } else
            {
                return response()->json([
                   'error' => 'invalid_credentials'
                ], 403);

            }
        }

        return response()->json([
            'error' => 'invalid_credentials',
            403
        ]);

    }


}
