<?php

namespace App\Repositories;

use Log;
use Illuminate\Support\Facades\Auth;
use App\Bases\Traits\BaseRepository;
use App\Models\User;

class UserRepository
{

    use BaseRepository;

    function __construct(User $user)
    {
        $this->model = $user;
    }

    public function authenticate($arg)
    {
        $response = [];
        if (Auth::attempt(['email' => $arg['email'], 'password' => $arg['password']])) {
            $user = Auth::user();
            $response = [
                'token' => $user->createToken('Laravel Personal Access Client')->accessToken
            ];
            return $response;
        }
        return $response;
    }

    public function register($arg)
    {
        $arg['password'] = bcrypt($arg['password']);
        $user = $this->create($arg);
        $response = [
            'token' => $user->createToken('Laravel Personal Access Client')->accessToken,
            'user' => $user
        ];

        return $response;
    }

}
