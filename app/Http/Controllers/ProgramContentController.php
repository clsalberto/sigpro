<?php

namespace App\Http\Controllers;

use App\ClassDate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use App\ProgramContent;
use App\Room;

class ProgramContentController extends Controller
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
     * Display a registration form .
     *
     * @param  int  $room_id
     * @param  int  $class_date_id
     * @return \Illuminate\Http\Response
     */
    public function index($room_id, $class_date_id)
    {
        $room = Room::find($room_id);
        $class_date = $room->classDates()->find($class_date_id);

        return view('contents.index', compact(['room', 'class_date']));
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $data = $request->all();
        $this->validator($data)->validate();
        $this->create($data);

        return redirect()->route('frequencies', [$data['room_id'], $data['class_date_id']]);
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
        $class_date = $room->classDates()->find($class_date_id);

        return view('contents.show', compact(['room', 'class_date']));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'content' => 'required|string|min:20'
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\ProgramContent
     */
    protected function create(array $data)
    {
        $class_date = ClassDate::find($data['class_date_id']);
        if ($class_date->has_content) {
            return $class_date->programContent()->update([
                'content' => $data['content'],
            ]);
        } else {
            return $class_date->programContent()->create([
                'content' => $data['content'],
            ]);
        }

    }
}
