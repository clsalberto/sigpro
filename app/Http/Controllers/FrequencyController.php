<?php

namespace App\Http\Controllers;

use App\ClassDate;
use App\Room;
use App\Frequency;

class FrequencyController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $room = Room::find($id);

        $dates = $room->classDates()
            ->orderBy('class_date')->get();

        return view('frequencies.index', compact(['room', 'dates']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $room_id
     * @param  int  $class_date_id
     * @return \Illuminate\Http\Response
     */
    public function show($room_id, $class_date_id)
    {
        $room = Room::find($room_id);
        $registrations = collect($room->registrations()->with('student')->get())->sortBy('student.name');
        $registrations->values()->all();
        $class_date = $room->classDates()->find($class_date_id);

        return view('frequencies.show', compact(['room', 'registrations', 'class_date']));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $room_id
     * @param  int  $class_date_id
     * @return \Illuminate\Http\Response
     */
    public function print($room_id, $class_date_id)
    {
        $room = Room::find($room_id);
        $registrations = collect($room->registrations()->with('student')->get())->sortBy('student.name');
        $registrations->values()->all();
        $class_date = $room->classDates()->find($class_date_id);

        return view('frequencies.print', compact(['room', 'registrations', 'class_date']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $class_date_id
     * @param  int  $registration_id
     * @return \Illuminate\Http\Response
     */
    public function active($class_date_id, $registration_id)
    {
        ClassDate::find($class_date_id)->update(['active' => true]);
        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update(['presence' => true]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive($class_date_id, $registration_id)
    {
        ClassDate::find($class_date_id)->update(['active' => true]);
        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update(['presence' => false]);
    }
}
