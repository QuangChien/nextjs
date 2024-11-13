<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(LoginRequest $request)
    {
        $data = [
            'success' => true,
            'message' => "Đăng nhập thành công.",
        ];

        if (!Auth::attempt($request->only('email', 'password'))) {
            $data['success'] = false;
            $data['message'] = "Email hoặc mật khẩu không đúng.";
            $data['errors'] = "Email hoặc mật khẩu không đúng.";
            return response()->json($data, 401);
        }

        $user = Auth::user();
        $token = $user->createToken($user->id)->plainTextToken;
        $data['token'] = $token;
        return response()->json($data);
    }

    public function register(RegisterRequest $request)
    {
        $data = [
            'success' => true,
            'message' => "Đăng ký tài khoản thành công.",
        ];
        try {
            $user = User::create([
                'name' => strstr($request->email, '@', true),
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $token = $user->createToken($user->id)->plainTextToken;
            $data['token'] = $token;
        }catch (\Exception){
            $data['success'] = false;
            $data['message'] = "Có lỗi xảy ra, vui lòng thử lại sau.";
            $data['errors'] = "Có lỗi xảy ra, vui lòng thử lại sau.";
        }

        return response()->json($data);
    }

    public function logout()
    {
        $data = [
            'success' => true,
            'message' => "Đăng xuất tài khoản thành công.",
        ];
        try {
            Auth::user()->tokens()->delete();
        }catch (\Exception){
            $data['success'] = false;
            $data['errors'] = "Có lỗi xảy ra, vui lòng thử lại sau.";
        }

        return response()->json($data);
    }

    public function userProfile()
    {
        return response()->json(Auth::user());
    }
}
