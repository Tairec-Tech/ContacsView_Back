<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    // 🔹 Listar todos los contactos del usuario
    public function index()
    {
        $contacts = Auth::user()->contacts()->get();
        return response()->json($contacts);
    }

    // 🔹 Crear un nuevo contacto
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'favorite' => 'nullable|boolean',
        ]);

        $contact = Auth::user()->contacts()->create($request->all());

        return response()->json($contact, 201);
    }

    // 🔹 Obtener un contacto específico
    public function show($id)
    {
        $contact = Auth::user()->contacts()->findOrFail($id);
        return response()->json($contact);
    }

    // 🔹 Actualizar un contacto
    public function update(Request $request, $id)
    {
        $contact = Auth::user()->contacts()->findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:100',
            'lastname' => 'nullable|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'nullable|email|max:255',
            'address' => 'nullable|string|max:255',
            'notes' => 'nullable|string',
            'favorite' => 'nullable|boolean',
        ]);

        $contact->update($request->all());

        return response()->json($contact);
    }
}
