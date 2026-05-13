<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Destination;



class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $destinations = Destination::all();

        return view('pages.booking', compact('destinations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
        {
            $destination = Destination::findOrFail($request->destination_id);

            $travelers = $request->travelers;

            $subtotal = $destination->price * $travelers;

            $total = $subtotal; // + ($request->insurance ? 50 : 0);

            Booking::create([
                'destination_id' => $destination->id,
                'full_name' => $request->full_name,
                'email' => $request->email,
                'phone' => $request->phone,
                'country' => $request->country,
                'age_group' => $request->age_group,
                'accommodation' => $request->accommodation,
                'dietary_requirements' => $request->dietary_requirements,
                'special_requests' => $request->special_requests,
                'travelers' => $travelers,
                'duration' => $request->duration,
                'preferred_date' => $request->preferred_date,
                'departure_date' => $request->departure_date,
                'subtotal' => $subtotal,
                'total_amount' => $total,
                'status' => 'pending'
            ]);

            return redirect('/booking')->with('success', 'Booking submitted successfully!');
        }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        //
    }
}
