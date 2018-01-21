<?php

namespace App\Http\Controllers;

use App\Score;
use Illuminate\Http\Request;
use App\Room;

class ScoreController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        $registrations = collect($room->registrations()->with('student')->get())->sortBy('student.name');
        $registrations->values()->all();

        return view('scores.show', compact(['room', 'registrations']));
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function print($id)
    {
        $room = Room::findOrFail($id);
        $registrations = collect($room->registrations()->with('student')->get())->sortBy('student.name');
        $registrations->values()->all();

        return view('scores.print', compact(['room', 'registrations']));
    }

    private function has_equals(array $data)
    {
        foreach($data as $value) {
            if ($value == "" || ctoi($value) <> ctoi($data[0])) {
                return false;
            }
        }
        return true;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param $id
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $room = Room::find($id);

        if ($room->check_score) {
            return redirect()->route('scores.students', $id)->with('error', 'Ops! Este lançamento já foi finalizado!');
        }

        if ($this->has_equals($request->punctuation_a)) {
            return redirect()->route('scores.students', $id)->with('error', 'Ops! A coluna AP1 não pode ter todos os seus valores iguais!');
        }

        if ($room->formula->id > 2) {
            if ($this->has_equals($request->punctuation_b)) {
                return redirect()->route('scores.students', $id)->with('error', 'Ops! A coluna AP2 não pode ter todos os seus valores iguais!');
            }
        }

        if ($this->has_equals($request->punctuation_c)) {
            return redirect()->route('scores.students', $id)->with('error', 'Ops! A coluna AF não pode ter todos os seus valores iguais!');
        }

        $room->update(['active' => true]);

        $registrations = collect($request->registration_id);

        if (isset($request->punctuation_a)) {
            $collection_a = $registrations->combine($request->punctuation_a);
            foreach ($collection_a as $registration_id => $punctuation_a) {
                Score::where('registration_id', $registration_id)
                    ->update(['punctuation_a' => ctoi($punctuation_a)]);
            }
        }

        if (isset($request->punctuation_b)) {
            $collection_b = $registrations->combine($request->punctuation_b);
            foreach ($collection_b as $registration_id => $punctuation_b) {
                Score::where('registration_id', $registration_id)
                    ->update(['punctuation_b' => ctoi($punctuation_b)]);
            }
        }

        if (isset($request->punctuation_c)) {
            $collection_c = $registrations->combine($request->punctuation_c);
            foreach ($collection_c as $registration_id => $punctuation_c) {
                Score::where('registration_id', $registration_id)
                    ->update(['punctuation_c' => ctoi($punctuation_c)]);
            }
        }

        if (isset($request->punctuation_d)) {
            $collection_d = $registrations->combine($request->punctuation_d);
            foreach ($collection_d as $registration_id => $punctuation_d) {
                Score::where('registration_id', $registration_id)
                    ->update(['punctuation_d' => ctoi($punctuation_d)]);
            }
        }

        return redirect()->route('scores.students', $id)->with('success', 'Operação realizada com sucesso!');
    }
}
