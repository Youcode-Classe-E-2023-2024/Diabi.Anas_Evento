<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Events;
use App\Models\reservations;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class StatisticsController extends Controller
{
    public function index()
    {
        $userCount = User::count();
        $eventCount = Events::count();
        $userId = Auth::user()->id;
        
        $reservations = Reservations::where('user_id', $userId)
        ->where('is_aprroved','=',false)
        ->get();

        if (Auth::check() && Auth::user()->role_id == 1) {
            $role = ['isAdmin' => true];
        } else {
            $role = ['isAdmin' => false];
        }

        $black_hover = 'statistics';

        return view('statistics', compact('userCount', 'eventCount', 'black_hover', 'role', 'reservations'));
    }



    public function approve($event_id)
    {
        $request = reservations::findOrFail($event_id);

        $request->is_aprroved = 1 ;
        $request->save();

        return redirect()->back()->with('success', 'request approved !');
        

    }
}
