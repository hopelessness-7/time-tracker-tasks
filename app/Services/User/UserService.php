<?php

namespace App\Services\User;

use App\Repositories\Eloquent\UserRepository;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class UserService
{
    protected UserRepository $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function show(string $id): Model
    {
        return $this->userRepository->find($id);
    }

    public function store(array $data): Model
    {
        $data['password'] = Hash::make($data['password']);
        return $this->userRepository->create($data);
    }

    public function checkLoginUser($credentials): Authenticatable|null
    {
        if (auth()->attempt($credentials)) {
            return auth()->user();
        } else {
            throw new \Exception('credentials are incorrect', 423);
        }
    }
}
