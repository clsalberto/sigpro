<?php

namespace App\Http\Controllers;

use App\ClassDate;
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

        $dates = $room->classDates()
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
        $registrations = collect($room->registrations()->with('student')->get())->sortBy('student.name');
        $registrations->values()->all();
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
        $registrations = collect($room->registrations()->with('student')->get())->sortBy('student.name');
        $registrations->values()->all();
        $class_date = $room->classDates()->find($class_date_id);

        return view('scores.print', compact(['room', 'registrations', 'class_date']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $room_id
     * @param $class_date_id
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $room_id, $class_date_id)
    {
        ClassDate::find($class_date_id)->update(['active' => true]);

        $registrations = collect($request->registration_id);

        if (isset($request->punctuation_a)) {
            $collection_a = $registrations->combine($request->punctuation_a);
            foreach ($collection_a as $registration_id => $punctuation_a) {
                Score::where('registration_id', $registration_id)
                    ->where('class_date_id', $class_date_id)
                    ->update(['punctuation_a' => ctoi($punctuation_a)]);
            }
        }

        if (isset($request->punctuation_b)) {
            $collection_b = $registrations->combine($request->punctuation_b);
            foreach ($collection_b as $registration_id => $punctuation_b) {
                Score::where('registration_id', $registration_id)
                    ->where('class_date_id', $class_date_id)
                    ->update(['punctuation_b' => ctoi($punctuation_b)]);
            }
        }

        if (isset($request->punctuation_c)) {
            $collection_c = $registrations->combine($request->punctuation_c);
            foreach ($collection_c as $registration_id => $punctuation_c) {
                Score::where('registration_id', $registration_id)
                    ->where('class_date_id', $class_date_id)
                    ->update(['punctuation_c' => ctoi($punctuation_c)]);
            }
        }

        if (isset($request->punctuation_d)) {
            $collection_d = $registrations->combine($request->punctuation_d);
            foreach ($collection_d as $registration_id => $punctuation_d) {
                Score::where('registration_id', $registration_id)
                    ->where('class_date_id', $class_date_id)
                    ->update(['punctuation_d' => ctoi($punctuation_d)]);
            }
        }

        return redirect()->route('scores.students', [$room_id, $class_date_id])->with('success', 'Operação realizada com sucesso!');

    }
}
