<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;

class ServiceFrontendController extends Controller
{
    /**
     * Display all services.
     */
    public function index()
    {
        $services = Service::all();
        return view('service_frontend.index', compact('services'));
    }

    /**
     * Show the booking form with the selected service pre-selected.
     */
    public function book(Service $service)
    {
        $services = Service::all(); // needed for the dropdown
        return view('services.book', compact('service', 'services'));
    }

    /**
     * Handle the booking form submission.
     */
    public function submitBooking(Request $request)
    {
        $validated = $request->validate([
            'service_id'   => 'required|exists:services,id',
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'nullable|string|max:20',
            'message'      => 'nullable|string|max:1000',
            'booking_date' => 'required|date|after_or_equal:today',
        ]);

        // TODO: save to DB, send email, etc.
        // Booking::create($validated);

        return redirect()->route('services.index')
                         ->with('success', 'Booking submitted successfully!');
    }
}
