<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\Authentication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    public function register(Request $request)
    {
        // Ensures that the data being submitted to register is valid
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
            'confirm_password' => 'required|same:password'
        ]);

        // If everything is valid, create a new user
        // and return a successful 204 response meaning an entity has been created.
            if(!$validator->fails()) {
                $user = User::create([
                   'name' =>  $request->get('name'),
                    'email' => $request->get('email'),
                    'password' => bcrypt($request->get('password'))
                ]);

                return response()->json(['message' => "Succesful registration" ], 200);
            }
        // Return the errors from the validator and a failure flag.
        return response()->json([
            'success' => false,
            'errors' => $validator->errors()
        ], 422);

    }

    /*
     * Authenticates a user in the system
     *
     */

    public function login( Request $request)
    {
        $authentication = new Authentication($request->all(), $request->user());
        //return $request->user();
        return $authentication->authenticateRequest();
    }
}
