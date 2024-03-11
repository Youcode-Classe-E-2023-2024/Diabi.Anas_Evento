<?php

namespace App\Http\Controllers;

use App\Models\Events;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;

class MainController extends Controller
{
    public function index()
    {
        $black_hover = 'home';

        if (Cache::has('cashed_events')){
            $events=Cache::get('cashed_events');
        }else{
            $events=Events::where('status','=','published')->get();
            Cache::put('cashed_events',$events,60);
        }

        $events = Events::where('status', '=', 'published')->get();
        
        $data = compact('events', 'black_hover');
        return view('main')->with($data);
    }

  
}
