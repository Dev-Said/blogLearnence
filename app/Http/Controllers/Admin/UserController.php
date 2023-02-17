<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    private UserService $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        User::findOrFail(58);
        $users = $this->userService->all();
         return view('admin.users.index', [
            'users' => $users
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = new User;
        return view('admin.users.create', ['user' => $user]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse
    {
     
        $validate = $request->validate([
            "name" => "required|string|min:3|max:255",
            "email" => "required|email|distinct|max:255",
            "role" => "required",
            "password" => "required",
            'password_confirmation' => 'required|same:password',
        ]);
        $this->userService->create($validate);
       
        return redirect()->route('admin.users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
         return view('admin.users.edit', ['user' => $user]);
    }


    public function update(User $user, Request $request): RedirectResponse
    {
        $validate = $request->validate([
            "name" => "required|string|min:3|max:255",
            "email" => "required|email|distinct|max:255",
            "role" => "required",
            "password" => "required",
            'password_confirmation' => 'required|same:password',
        ]);
        $this->userService->update($user, $validate);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function confirmDelete(User $user)
    {
        return view('admin.users.confirm-delete', ['user' => $user]);
    }

    public function destroy(User $user)
    {
        $this->userService->delete($user);

        return redirect()->route('admin.users.index');
    }
}
