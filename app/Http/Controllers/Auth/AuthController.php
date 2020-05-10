<?php

namespace App\Http\Controllers\Auth;

use App\Http\Requests\Guardian\GuardianRequest;
use App\Services\GuardianService;
use App\Services\StudentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    private $guardianService;
    private $studentService;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(GuardianService $guardianService, StudentService $studentService)
    {
        $this->middleware('auth:api', ['except' => ['login', 'register']]);
        $this->guardianService = $guardianService;
        $this->studentService = $studentService;
    }

    /**
     * Get a JWT token via given credentials.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if ($token = $this->guard()->attempt($credentials)) {
            return $this->respondWithToken($token);
        }

        return response()->json(['error' => 'Unauthorized'], 401);
    }

    /**
     * Get the authenticated User
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me()
    {
        return response()->json($this->guard()->user());
    }

    /**
     * Log the user out (Invalidate the token)
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout()
    {
        $this->guard()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Refresh a token.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function refresh()
    {
        return $this->respondWithToken($this->guard()->refresh());
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
            'expires_in' => $this->guard()->factory()->getTTL() * 60
        ]);
    }

    /**
     * Get the guard to be used during authentication.
     *
     * @return \Illuminate\Contracts\Auth\Guard
     */
    public function guard()
    {
        return Auth::guard();
    }

    public function register(GuardianRequest $request){
        $studentId = $this->studentService->getStudentIdByAccessCode($request->post('access_code'));

        $guardian = $this->guardianService->create([
            'student_id' => $studentId,
            'name' => $request->post('name'),
            'surname' => $request->post('surname'),
            'email' => $request->post('email'),
            'password' => Hash::make($request->post('password')),
            'access_code' => $request->post('access_code'),
        ]);

        $data = [
            'status' => true,
            'code' => 200,
            'data' => [
                'Guardian' => $guardian
            ],
            'err' => null
        ];


        return response()->json($data);
    }
}