<?php

// Namespace
namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use JWTAuth;
use Auth;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthenticationController extends Controller {

    // Default constructor
  public function __construct() { }

  protected function AuthenticateToken(Request $request) {
    // Grab the credentials from the request
    $credentials = $request->only('username', 'password');
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

  protected function AuthenticateCookie(Request $request) {
    $credentials = $request->only('username', 'password');
    if(Auth::attempt($credentials)) {
      return response()->json("success");
    }    
    else {
      return response()->json("failure");
    }
  }

  protected function Logout() {
    Auth::Logout();
    return response()->json("success");
  }
}

?>