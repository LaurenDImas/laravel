<?php
namespace App\Service;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthService
{
    public function register(array $payload){
        $payload['password'] = bcrypt($payload['password']);
        return User::create($payload);
    }

    public function authenticationUser(array $payload){
        $user = User::where('email', $payload['email'])->first();
        if(is_null($user)){
            return false;
        }

        if(!Hash::check($payload['password'], $user->password)){
            return false;
        }

        return $user;
    }

    public function generateToken(User $user): string
    {
       return $user->createToken('api')->plainTextToken;
    }

    public function logout(User $user){

    }
}
