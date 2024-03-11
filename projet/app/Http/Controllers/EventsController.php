<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\reservations;
use App\Models\categorie;
use Illuminate\Support\Facades\Auth;



class EventsController extends Controller
{


    public function index()
    {

        $black_hover = 'Manage events';

        $user = Auth::user();
        $userid = $user->id;
        $userevents = Events::where('user_id', '=', $userid)->get();
        $events = Events::all();
        $categories = Categorie::All();
        $data = compact('categories', 'black_hover', 'events', 'user', 'userevents');
        return view('manageEvent')->with($data);
    }
    public function details($event_id)
    {

        $black_hover = 'home';
        $event = Events::findOrFail($event_id);
        $categories = Categorie::All();
        $data = compact('categories', 'black_hover', 'event');
        return view('eventDetails')->with($data);
    }
    public function reserve()
    {

        $black_hover = 'Reserve a ticket';

        $events = Events::where('start_date', '>=', now())
            ->where('status', '=', 'published')
            ->orderBy('start_date', 'asc')
            ->get();
        $data = compact('events', 'black_hover');
        return view('reserve')->with($data);
    }
    public function reserveTickets(Request $request, $eventId)
    {

        $validated = request()->validate([
            'numberOfTickets' => 'required'
        ]);

        $event = Events::findOrFail($eventId);
        $user_id = $event->user_id;
        $reserv = new reservations();

        $numberOfTickets = $request->numberOfTickets;
        // Check if there are enough available places
        if ($event->available_places >= $numberOfTickets) {
            if ($event->method == 'A') {
                // Reduce the available places
                $event->available_places -= $numberOfTickets;
                $event->save();
                
                $reserv->tickets = $numberOfTickets ;
                $reserv->user_id = $user_id ;
                $reserv->event_id = $eventId ;
                $reserv->is_aprroved = 1 ;
                $reserv->save();

                return redirect()->back()->with('success', 'Ticket Reserved successfully!');
            } elseif ($event->method == 'M') {

               

                $event->available_places -= $numberOfTickets;
                $event->save();

                $reserv->user_id = $user_id ;
                $reserv->event_id = $eventId ;
                $reserv->tickets = $numberOfTickets ;
                $reserv->save();
                return redirect()->back()->with('info', 'Your booking request has been submitted. Please wait for confirmation.');
                

            }
        } 
    }






    public function create(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'method' => 'required',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'guestCapacity' => 'required|integer|min:1',
            'category' => 'required',
            'place' => 'required',
            'price' => 'required',
        ]);

        // Retrieve the authenticated user's ID
        $user_id = Auth::id();
        // Create the event
        $event = new Events();
        $event->user_id = $user_id;
        $event->title = $request->title;
        $event->description = $request->description;
        $event->place = $request->place;
        $event->price = $request->price;
        $event->method = ($request->method == 'auto') ? 'A' : 'M';
        $event->categorie_id = $request->category;
        $event->available_places = $request->guestCapacity;
        $event->start_date = $request->startDate;
        $event->end_date = $request->endDate;
        $event->save();

        // Add a success message to the session using with()
        return redirect()->route('manageEvents')->with('success', 'Event created successfully!');
    }

    public function edite($event_id)
    {

        $black_hover = 'Manage events';
        $event = Events::findorfail($event_id);
        $categories = Categorie::All();
        $data = compact('event', 'black_hover', 'categories');
        return view('editEvent')->with($data);
    }

    public function update(Request $request, $event_id)
    {

        // Retrieve the event from the database
        $event = Events::findOrFail($event_id);


        // Validate the incoming request
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'startDate' => 'required|date',
            'endDate' => 'required|date|after_or_equal:startDate',
            'guestCapacity' => 'required|integer|min:1',
            'category' => 'required',
            'place' => 'required',
            'method' => 'required',
            'price' => 'required',
        ]);


        $event->title = $request->title;
        $event->description = $request->description;
        $event->place = $request->place;
        $event->price = $request->price;
        $event->method = $request->method;
        $event->categorie_id = $request->category;
        $event->available_places = $request->guestCapacity;
        $event->start_date = $request->startDate;
        $event->end_date = $request->endDate;
        $event->save();

        // Add a success message to the session using with()
        return redirect()->route('manageEvents')->with('success', 'Event updated successfully!');
    }

    public function delete($event_id)
    {
        $event = Events::findorfail($event_id);
        $event->delete();

        return redirect()->route('manageEvents')->with('deleted', 'Event has been deleted.');
    }
    public function publish($event_id)
    {
        $event = Events::findOrFail($event_id);

        if ($event->status == 'published') {
            $newStatus = 'archived';
        } else {
            $newStatus = 'published';
        }

        // Update the status
        $event->status = $newStatus;
        $event->save();

        return redirect()->route('manageEvents')->with('deleted', 'Event has been Published.');
    }
    public function searchEvent(Request $request)
    {
        $search = $request->input('search');

        $black_hover = 'Reserve a ticket';



        // Utilisez la méthode where pour filtrer les événements par titre
        $events = Events::where('title', 'like', '%' . $search . '%')->get();

        return view('reserve', compact('black_hover', 'events'));
    }
}
