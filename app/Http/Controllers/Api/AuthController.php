<?php

namespace App\Http\Controllers\Api;

use App\Classes\ActivationService;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public $activationService;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(ActivationService $activationService)
    {
        $this->activationService = $activationService;
        $this->middleware('jwt', ['except' => ['login','register']]);
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login()
    {
        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * Register new User
     *
     * @return \Illuminate\Http\JsonResponse
     */

    public function register(){
        $credential = request(['email','password','f_name','l_name']);

        if($this->checkEmail($credential['email'])){
            return response()->json(['message' => 'email is used'],401);
        }

        $user = User::create([
            'f_name' => $credential['f_name'],
            'l_name' => $credential['l_name'],
            'email' => $credential['email'],
            'password' => bcrypt($credential['password']),
        ]);
        if($user){
            return ($this->activationService->sendActivationMail($user)) ?
                $this->responseRegisterSuccess() :
                $this->responseRegisterFaile();
        }
    }

    private function responseRegisterSuccess(){
        return response()->json(['message'=>'register success'],200);
    }

    private function responseRegisterFaile(){
        return response()->json(['message' => 'register failed'],404);
    }
    private function checkEmail($email){
        return (User::where('email',$email)->first()) ? true : false;
    }
    /**
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json(auth()->user());
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken(auth()->refresh());
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
