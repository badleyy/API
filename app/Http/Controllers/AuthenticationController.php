<?php

// Namespace
namespace App\Http\Controllers;

class AuthenticationController extends Controller {

	// Default constructor
	public function __construct()
    { }

	protected function Authenicate(Request $request) {
		// Grab the credentials from the request
		$credentials = $request->only('email', 'password');
        try {
            // verify the credentials and create a token for the user
            if (! $token = JWTAuth::attempt($credentials)) {
                return response()->json(['error' => 'invalid_credentials'], 401);
            }
        } catch (JWTException $e) {
            // something went wrong
            return response()->json(['error' => 'could_not_create_token'], 500);
        }
        // if no errors are encountered we can return a JWT
        return response()->json(compact('token'));
    }
}

?>