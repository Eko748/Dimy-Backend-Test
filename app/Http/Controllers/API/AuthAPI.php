<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAPI extends Controller
{
    private $data;

    public function __construct()
    {
        $this->data = new User();
    }

    public function login(Request $request)
    {
        try {
            if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
                $user = Auth::user();
                $success = [];
                $data = $this->data->where('id', $user->id)->first();
                $success['token'] = $data->createToken('MyApp', [$user->id])->plainTextToken;
                return $this->sendSuccessResponse($success);
            } else {
                return response()->json(['error' => 'Unauthorized'], 401);
            }
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Failed to fetch items.', 500, $e->getMessage());
        }
    }

    public function register(Request $request)
    {
        try {
            $user = User::create([
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password')),
            ]);
            return $this->sendSuccessResponse($user);
        } catch (\Exception $e) {
            return $this->sendErrorResponse('Failed to fetch items.', 500, $e->getMessage());
        }
    }

    public function logout(Request $request)
    {
        $request->bearerToken();

        return response()->json(['message' => 'Logout successful'], 200);
    }
}
