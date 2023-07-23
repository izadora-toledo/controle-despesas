<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UserRegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

class UserController extends Controller
{
    public function register(UserRegisterRequest $request)
    {
        $data = $request->validated();

        if ($data['password'] !== $data['password_confirmation']) {
            return response()->json(['message' => 'Password não está correto'], 400);
        }

        $existingUser = User::where('email', $data['email'])->first();
        if ($existingUser) {
            return response()->json(['message' => 'Esse e-mail já está em uso'], 400);
        }

        $user = new User([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
        $user->save();
        return response()->json(['message' => 'Usuário registrado com sucesso!'], 201);
    }

    public function index()
    {
        $users = User::all();
        return UserResource::collection($users);
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UserRegisterRequest $request, User $user)
    {

        if ($user->id === auth()->user()->id) {
            $user->name = $request->input('name');
            $user->email = $request->input('email');
            $user->save();
            return response()->json(['message' => 'Usuário atualizado com sucesso!']);
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }

    public function destroy(User $user)
    {
        if (auth()->user()->id === 1) {
            $user->delete();
            return response()->json(['message' => 'Usuário deletado com sucesso!']);
        }

        if ($user->id === auth()->user()->id) {
            $user->delete();
            return response()->json(['message' => 'Usuário deletado com sucesso!']);
        }

        return response()->json(['error' => 'Unauthorized'], 403);
    }
}
