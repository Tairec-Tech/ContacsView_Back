<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    // 🔹 Listar todos los usuarios (solo para pruebas)
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // 🔹 Crear un nuevo usuario (registro)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:70',
            'username' => 'required|string|max:50|unique:users',
            'email' => 'required|email|max:100|unique:users',
            'password' => 'required|string|min:6',
        ]);

        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password), // 👈 CORREGIDO
        ]);

        return response()->json($user, 201);
    }

    // 🔹 Mostrar un usuario específico
    public function show($id)
    {
        $user = User::findOrFail($id);
        return response()->json($user);
    }

    // 🔹 Actualizar usuario
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'nullable|string|max:70',
            'username' => 'nullable|string|max:50|unique:users,username,'.$user->id,
            'email' => 'nullable|email|max:100|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:6',
        ]);

        $data = $request->only(['name', 'username', 'email']);

        if ($request->password) {
            $data['password'] = Hash::make($request->password); // 👈 CORREGIDO
        }

        $user->update($data);

        return response()->json($user);
    }

    // 🔹 Eliminar usuario (opcional)
    /*
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return response()->json(['message' => 'Usuario eliminado correctamente']);
    }
    */
}

