<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Appointment::with(['requestedBy', 'assignedTo']);

        if ($request->filled('status')) {
            $query->where('status', $request->input('status'));
        }

        if ($request->filled('date')) {
            $query->where('appointment_date', $request->input('date'));
        }

        $appointments = $query->orderBy('appointment_date', 'desc')->paginate(15)->withQueryString();

        return view('admin.appointments.index', [
            'appointments' => $appointments,
        ]);
    }

    public function create()
    {
        $users = User::where('is_active', true)->orderBy('name')->get();

        return view('admin.appointments.create', [
            'users' => $users,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'            => ['required', 'string', 'max:200'],
            'description'      => ['nullable', 'string', 'max:1000'],
            'assigned_to'      => ['required', 'integer', 'exists:users,id'],
            'appointment_date' => ['required', 'date', 'after_or_equal:today'],
            'start_time'       => ['required', 'date_format:H:i'],
            'end_time'         => ['required', 'date_format:H:i', 'after:start_time'],
            'location'         => ['nullable', 'string', 'max:200'],
        ]);

        $appointment = new Appointment();
        $appointment->title            = $request->input('title');
        $appointment->description      = $request->input('description');
        $appointment->requested_by     = Auth::id();
        $appointment->assigned_to      = $request->input('assigned_to');
        $appointment->appointment_date = $request->input('appointment_date');
        $appointment->start_time       = $request->input('start_time');
        $appointment->end_time         = $request->input('end_time');
        $appointment->location         = $request->input('location');
        $appointment->status           = 'pending';
        $appointment->save();

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment scheduled successfully.');
    }

    public function show(Appointment $appointment)
    {
        $appointment->load(['requestedBy', 'assignedTo']);

        return view('admin.appointments.show', [
            'appointment' => $appointment,
        ]);
    }

    public function edit(Appointment $appointment)
    {
        $users = User::where('is_active', true)->orderBy('name')->get();

        return view('admin.appointments.edit', [
            'appointment' => $appointment,
            'users'       => $users,
        ]);
    }

    public function update(Request $request, Appointment $appointment)
    {
        $request->validate([
            'title'            => ['required', 'string', 'max:200'],
            'description'      => ['nullable', 'string', 'max:1000'],
            'assigned_to'      => ['required', 'integer', 'exists:users,id'],
            'appointment_date' => ['required', 'date'],
            'start_time'       => ['required', 'date_format:H:i'],
            'end_time'         => ['required', 'date_format:H:i', 'after:start_time'],
            'location'         => ['nullable', 'string', 'max:200'],
            'status'           => ['required', 'in:pending,confirmed,cancelled,completed'],
        ]);

        $appointment->title            = $request->input('title');
        $appointment->description      = $request->input('description');
        $appointment->assigned_to      = $request->input('assigned_to');
        $appointment->appointment_date = $request->input('appointment_date');
        $appointment->start_time       = $request->input('start_time');
        $appointment->end_time         = $request->input('end_time');
        $appointment->location         = $request->input('location');
        $appointment->status           = $request->input('status');

        if ($request->input('status') === 'cancelled') {
            $request->validate([
                'cancellation_reason' => ['required', 'string', 'max:500'],
            ]);
            $appointment->cancellation_reason = $request->input('cancellation_reason');
        }

        $appointment->save();

        return redirect()->route('admin.appointments.show', $appointment)->with('success', 'Appointment updated successfully.');
    }

    public function destroy(Appointment $appointment)
    {
        $appointment->delete();

        return redirect()->route('admin.appointments.index')->with('success', 'Appointment deleted successfully.');
    }
}
