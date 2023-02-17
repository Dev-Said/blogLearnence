<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    /**
     * Display a listing of the resource.
     */
    public function all()
    {
        return User::paginate(1);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function create(array $data): User
    {
        return User::create($data + [
            "password" => $this->setPassword($data["password"])
        ]);
    }


    public function update(User $user, array $data): User
    {
        $user->update($data + [
            "password" => $this->setPassword($data["password"])
        ]);

        return $user->fresh();
    }

    public function delete(User $user): bool
    {
        return $user->delete();
    }

    private function setPassword (string $password): string
    {
        return bcrypt($password);
    }
}
