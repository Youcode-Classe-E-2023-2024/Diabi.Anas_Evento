<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;



class MainController extends Controller
{
    public function index()
    {

        $black_hover = 'home';
        $events = Events::where('start_date', '>=', now())
            ->orderBy('start_date', 'asc')
            ->get();


        $data = compact('events', 'black_hover');
        return view('main')->with($data);
    }

    public function create(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'guestCapacity' => 'required|integer|min:1',
        ]);

        // Store the uploaded image
        // Retrieve the authenticated user's ID
        $user_id = Auth::id();
        // Create the event
        $event = new Events();
        $event->user_id = $user_id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->place = $request->place; // Assuming place is also part of the request
        $event->price = $request->price; // Assuming price is also part of the request
        $event->category = $request->category; // Assuming category is also part of the request
        $event->available_places = $request->guestCapacity;
        $event->start_date = $request->startDate;
        $event->end_date = $request->endDate;
        $event->save();

        // Redirect to a success page or return a response
        return redirect()->route('manageEvent'); // Replace 'success.route' with your actual success route name
    }
}
