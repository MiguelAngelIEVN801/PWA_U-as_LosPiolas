<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Mostrar todos los contactos.
     */
    public function index()
    {
        $contacts = Contact::orderBy('created_at', 'desc')->get(); // Ordenar por fecha de creación, descendente
        return view('admin.contacts.index', compact('contacts'));
    }

    // app/Http/Controllers/ContactController.php

public function create()
{
    return view('admin.contacts.create');
}


    /**
     * Guardar un nuevo contacto.
     */
    // app/Http/Controllers/ContactController.php

public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'message' => 'required|string',
    ]);

    // Crea el nuevo contacto
    Contact::create([
        'name' => $request->name,
        'email' => $request->email,
        'message' => $request->message,
    ]);

    return redirect()->route('admin.contacts.index')->with('success', 'Contacto agregado correctamente.');
}


    /**
     * Mostrar el formulario de edición de un contacto.
     */
    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        return view('admin.contacts.edit', compact('contact'));
    }

    /**
     * Actualizar un contacto.
     */
    public function update(Request $request, $id)
    {
        $contact = Contact::findOrFail($id);

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:contacts,email,' . $id, // Ignorar el correo actual del contacto
            'message' => 'required|string|max:500',
        ]);

        $contact->update($validatedData);

        return redirect()->route('admin.contacts.index')->with('success', 'Contacto actualizado correctamente.');
    }

    /**
     * Eliminar un contacto.
     */
    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('admin.contacts.index')->with('success', 'Contacto eliminado correctamente.');
    }
}
