<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    public function index() {
        $reservations = Reservation::all();
        return view('admin.pages.reservation', compact('reservations'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'full_name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'reservation_date' => 'required|date',
            'reservation_time' => 'required',
            'guests' => 'required|integer|min:1|max:7',
            'occasion' => 'nullable|string|max:100',
            'special_request' => 'nullable|string',
        ]);

        Reservation::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Reservation request submitted successfully.'
        ]);
    }
    public function show($id)
    {
        $reservation = Reservation::findOrFail($id);
        return response()->json($reservation);
    }
    public function update(Request $request, $id)
{
    $request->validate([
        'full_name' => 'required',
        'email' => 'required|email',
        'phone' => 'required',
        'reservation_date' => 'required',
        'reservation_time' => 'required',
    ]);

    $reservation = Reservation::findOrFail($id);

    $reservation->update([
        'full_name' => $request->full_name,
        'email' => $request->email,
        'phone' => $request->phone,
        'reservation_date' => $request->reservation_date,
        'reservation_time' => $request->reservation_time,
        'guests' => $request->guests,
        'occasion' => $request->occasion,
        'special_request' => $request->special_request,
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Reservation updated successfully'
    ]);
}
}
