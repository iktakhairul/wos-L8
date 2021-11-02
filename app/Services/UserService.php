<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;

class UserService
{
    protected $user;

    /**
     * Constructs a new User object.
     *
     * @param User $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * addUser make new user.
     *
     * @param Request $request
     * @param string $role
     * @param float $weight
     * @return User
     */
    public function addUser(Request $request, string $role = 'user', float $weight = 9.99): User
    {
        return $this->user->create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'contact_number' => $request->input('contact_number'),
            'password' => app('hash')->make($request->input('password')),
            'role' => $role,
            'weight' => $weight,
        ]);
    }
}
