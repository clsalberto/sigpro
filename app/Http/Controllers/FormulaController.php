<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formula;
use App\Room;

class FormulaController extends Controller
{
    /**
     * Create a new controller instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @param $id
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $room = Room::find($id);
        $formulas = Formula::all();

        return view('formulas.index', compact(['room', 'formulas']));
    }

    /**
     * Display a listing of the resource.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data = $request->all();
        $room = Room::find($data['room_id'])->update([
            'formula_id' => $data['formula_id'],
        ]);

        return redirect()->route('scores.students', $data['room_id'])
            ->with('success', 'Fórmula de lançamento de notas definida com sucesso!');
    }
}
