<?php

namespace App\Http\Controllers;

use App\Course;
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
        return view('rooms.index', compact('rooms'));
    }
}
