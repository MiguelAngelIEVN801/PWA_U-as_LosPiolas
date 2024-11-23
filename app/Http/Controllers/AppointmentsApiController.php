<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;

class AppointmentsApiController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'appointment_time' => 'required|date',
            'notes' => 'nullable|string',
        ]);

        $appointment = Appointment::create($validated);

        return response()->json(['message' => 'Cita agendada con éxito', 'appointment' => $appointment], 201);
    }
}
