<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class CitasController extends Controller
{
    public function index()
    {
        // Obtener todas las citas y devolverlas a la vista
        $citas = Appointment::all();
        return view('admin.citas.index', compact('citas'));
    }

    public function create()
    {
        // Retornar la vista para crear una cita
        return view('admin.citas.create');
    }

    public function store(Request $request)
{
    // Validar los datos de la cita
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email',
        'appointment_time' => 'required|date',
        'notes' => 'nullable|string',
    ]);

    try {
        // Crear la cita
        Appointment::create($validated);

        // Redirigir con éxito
        return redirect()->route('admin.citas.index')->with('success', 'Cita creada con éxito.');
    } catch (\Exception $e) {
        // Capturar cualquier error
        return redirect()->route('admin.citas.create')->with('error', 'Hubo un problema al agendar la cita: ' . $e->getMessage());
    }
}

    public function edit($id)
    {
        // Obtener la cita específica por ID y pasarla a la vista de edición
        $cita = Appointment::findOrFail($id);
        return view('admin.citas.edit', ['cita' => $cita]);
    }

    public function update(Request $request, $id)
    {
        // Validar los datos recibidos del formulario
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'appointment_time' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        // Buscar la cita por ID y actualizarla
        $cita = Appointment::findOrFail($id);
        $cita->update($validated);

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('admin.citas.index')->with('success', 'Cita actualizada con éxito.');
    }

    public function destroy($id)
    {
        // Buscar y eliminar la cita por ID
        $cita = Appointment::findOrFail($id);
        $cita->delete();

        // Redirigir al índice con un mensaje de éxito
        return redirect()->route('admin.citas.index')->with('success', 'Cita eliminada con éxito.');
    }
}
