<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // No auth: show all users
    public function index()
    {
        return User::all();
    }

    // Requires auth
    public function show(User $user)
    {
        return $user;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'email' => 'required|email|unique:users', 'password' => 'required',
        ]);

        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
    }

    public function update(Request $request, User $user)
    {
        $user->update($request->only('name', 'email'));
        return $user;
    }

    public function destroy(User $user)
    {
        $user->delete();
        return response()->json(['message' => 'deleted']);
    }
}

