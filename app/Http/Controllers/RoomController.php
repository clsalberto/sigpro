<?php

namespace App\Http\Controllers;

use App\Pact;
use Illuminate\Support\Facades\Auth;

class RoomController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the rooms list.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pact = Pact::all()->last();
        $rooms = Auth::user()->rooms;
        $rooms = collect($rooms->groupBy('city.name'));

        return view('rooms.index', compact('rooms'));
    }
}
