<?php

namespace App\Http\Controllers;

use App\Room;
use App\Frequency;
use App\ClassDate;
use App\Registration;

class FrequencyController extends Controller
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
     * @param int $room_id
     * @param int $class_date_id
     *
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
     * @param int $room_id
     * @param int $class_date_id
     *
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
     * Display the specified resource.
     *
     * @param int $room_id
     * @param int $class_date_id
     *
     * @return \Illuminate\Http\Response
     */
    public function checkFrequency($room_id, $class_date_id)
    {
        $room = Room::find($room_id);
        $room->classDates()->find($class_date_id)->update(['check_frequency' => true]);

        return redirect()->route('frequencies.students.print', [$room_id, $class_date_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function checkScore($id)
    {
        $room = Room::find($id)->update(['check_score' => true]);

        return redirect()->route('scores.students.print', $id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $class_date_id
     * @param int $registration_id
     *
     * @return \Illuminate\Http\Response
     */
    public function active_a($class_date_id, $registration_id)
    {
        $class_date = ClassDate::find($class_date_id);

        if ($class_date->check_frequency) {
            return false;
        }

        $class_date->update(['active' => true]);

        $registration = Registration::find($registration_id);
        $workload = $registration->workload + 1;
        $registration->update(['workload' => $workload]);

        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update([
                'justified' => false,
                'presence_a' => true
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive_a($class_date_id, $registration_id)
    {
        $class_date = ClassDate::find($class_date_id);

        if ($class_date->check_frequency) {
            return false;
        }

        $class_date->update(['active' => true]);

        $registration = Registration::find($registration_id);
        $workload = $registration->workload - 1;
        $registration->update(['workload' => $workload]);

        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update(['presence_a' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $class_date_id
     * @param int $registration_id
     *
     * @return \Illuminate\Http\Response
     */
    public function active_b($class_date_id, $registration_id)
    {
        $class_date = ClassDate::find($class_date_id);

        if ($class_date->check_frequency) {
            return false;
        }

        $class_date->update(['active' => true]);

        $registration = Registration::find($registration_id);
        $workload = $registration->workload + 1;
        $registration->update(['workload' => $workload]);

        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update([
                'justified' => false,
                'presence_b' => true
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive_b($class_date_id, $registration_id)
    {
        $class_date = ClassDate::find($class_date_id);

        if ($class_date->check_frequency) {
            return false;
        }

        $class_date->update(['active' => true]);

        $registration = Registration::find($registration_id);
        $workload = $registration->workload - 1;
        $registration->update(['workload' => $workload]);

        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update(['presence_b' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $class_date_id
     * @param int $registration_id
     *
     * @return \Illuminate\Http\Response
     */
    public function active_c($class_date_id, $registration_id)
    {
        $class_date = ClassDate::find($class_date_id);

        if ($class_date->check_frequency) {
            return false;
        }

        $class_date->update(['active' => true]);

        $registration = Registration::find($registration_id);
        $workload = $registration->workload + 1;
        $registration->update(['workload' => $workload]);

        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update([
                'justified' => false,
                'presence_c' => true
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive_c($class_date_id, $registration_id)
    {
        $class_date = ClassDate::find($class_date_id);

        if ($class_date->check_frequency) {
            return false;
        }

        $class_date->update(['active' => true]);

        $registration = Registration::find($registration_id);
        $workload = $registration->workload - 1;
        $registration->update(['workload' => $workload]);

        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update(['presence_c' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $class_date_id
     * @param int $registration_id
     *
     * @return \Illuminate\Http\Response
     */
    public function active_d($class_date_id, $registration_id)
    {
        $class_date = ClassDate::find($class_date_id);

        if ($class_date->check_frequency) {
            return false;
        }

        $class_date->update(['active' => true]);

        $registration = Registration::find($registration_id);
        $workload = $registration->workload + 1;
        $registration->update(['workload' => $workload]);

        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update([
                'justified' => false,
                'presence_d' => true
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function inactive_d($class_date_id, $registration_id)
    {
        $class_date = ClassDate::find($class_date_id);

        if ($class_date->check_frequency) {
            return false;
        }

        $class_date->update(['active' => true]);

        $registration = Registration::find($registration_id);
        $workload = $registration->workload - 1;
        $registration->update(['workload' => $workload]);

        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update(['presence_d' => false]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param int $class_date_id
     * @param int $registration_id
     *
     * @return \Illuminate\Http\Response
     */
    public function justified($class_date_id, $registration_id)
    {
        $class_date = ClassDate::find($class_date_id);

        if ($class_date->check_frequency) {
            return false;
        }

        $class_date->update(['active' => true]);

        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update([
                'presence_a' => false,
                'presence_b' => false,
                'presence_c' => false,
                'presence_d' => false,
                'justified' => true
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function not_justified($class_date_id, $registration_id)
    {
        $class_date = ClassDate::find($class_date_id);

        if ($class_date->check_frequency) {
            return false;
        }

        $class_date->update(['active' => true]);

        return Frequency::where('class_date_id', $class_date_id)
            ->where('registration_id', $registration_id)
            ->update(['justified' => false]);
    }
}
