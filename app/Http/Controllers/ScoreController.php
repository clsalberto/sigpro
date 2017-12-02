<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;

use App\Room;

class ScoreController extends Controller
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

        $first_day = date('Y-m-01');
        $last_day = date('Y-m-t');

        $dates = $room->classDates()
            //->where('class_date', '>=', $first_day)
            //->where('class_date', '<=', $last_day)
            ->where('avaliation', true)
            ->orderBy('class_date')->get();

        return view('scores.index', compact(['room', 'dates']));
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
        $room = Room::findOrFail($room_id);
        $registrations = $room->registrations()->orderBy('student_id')->get();
        $class_date = $room->classDates()->find($class_date_id);

        return view('scores.show', compact(['room', 'registrations', 'class_date']));
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
        $room = Room::findOrFail($room_id);
        $registrations = $room->registrations()->orderBy('student_id')->get();
        $class_date = $room->classDates()->find($class_date_id);

        return view('scores.print', compact(['room', 'registrations', 'class_date']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $room_id, $class_date_id)
    {

        $registrations = collect($request->registration_id);
        $collection = $registrations->combine($request->punctuation);

        foreach ($collection as $registration_id => $punctuation)
        {
            Score::where('registration_id', $registration_id)
                ->where('class_date_id', $class_date_id)
                ->update(['punctuation' => $punctuation]);
        }

        return redirect()->route('scores.students', [$room_id, $class_date_id])->with('success', 'Operação realizada com sucesso!');

    }
}
