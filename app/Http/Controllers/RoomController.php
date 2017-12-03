<?php

namespace App\Http\Controllers;

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
        $rooms = Auth::user()->rooms;
        $rooms = collect($rooms->groupBy('course.name'));

        return view('rooms.index', compact('rooms'));
    }
}
