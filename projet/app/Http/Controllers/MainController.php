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
        $events = Events::where('status', '=', 'published')->get();

        $data = compact('events', 'black_hover');
        return view('main')->with($data);
    }

  
}
