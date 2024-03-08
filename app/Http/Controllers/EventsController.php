<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\categorie;
use Illuminate\Support\Facades\Auth;



class EventsController extends Controller
{


public function index(){

    $black_hover = 'Manage events';
    $events = Events::All();
    $categories = Categorie::All();
    $data = compact('categories','black_hover','events');
    return view('manageEvent')->with($data);

}
public function reserve(){

    $black_hover = 'Reserve a ticket';

    $events = Events::where('start_date', '>=', now())
    ->orderBy('start_date', 'asc')
    ->get();
    $data = compact('events','black_hover');
    return view('reserve')->with($data);

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
        'category' => 'required', // Assuming category is required
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
    $event->categorie_id = $request->category; // Assuming category is also part of the request
    $event->available_places = $request->guestCapacity;
    $event->start_date = $request->startDate;
    $event->end_date = $request->endDate;
    $event->save();

    // Add a success message to the session using with()
    return redirect()->route('manageEvent')->with('success', 'Event created successfully!');
}
public function update(Request $request)
{
    // Validate the incoming request
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'startDate' => 'required|date',
        'endDate' => 'required|date|after_or_equal:startDate',
        'guestCapacity' => 'required|integer|min:1',
        'category' => 'required', // Assuming category is required
    ]);

    // Store the uploaded image
    $id = $request->input('event_id');

     // Retrieve the event from the database
     $event = Events::findOrFail($id);


    $event->title = $request->title;
    $event->description = $request->description;
    $event->place = $request->place; // Assuming place is also part of the request
    $event->price = $request->price; // Assuming price is also part of the request
    $event->categorie_id = $request->category; // Assuming category is also part of the request
    $event->available_places = $request->guestapacity;
    $event->start_date = $request->startDate;
    $event->end_date = $request->endDate;
    $event->save();

    // Add a success message to the session using with()
    return redirect()->route('manageEvent')->with('success', 'Event updated successfully!');
}
}
