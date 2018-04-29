<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

use App\Frequency;
use App\Justification;

class JustificationController extends Controller
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $frequency = Frequency::find($id);
        $registration = $frequency->registration()->first();
        $class_date = $frequency->classDate()->first();

        return view('justifications.index', compact(['frequency', 'registration', 'class_date']));
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

        return redirect()->route('justify.show', $data['frequency_id'])
            ->with('success', 'Frequência justificada com sucesso!');
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
            'comments' => 'required|string|min:20',
            'document' => 'required|image|mimes:jpeg,png,jpg',
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
        $frequency = Frequency::find($data['frequency_id']);

        $frequency->justification()->create([
            'comments' => $data['comments'],
            'document' => $this->document($data['document'], $frequency->id, 800)
        ]);

        $class_date = $frequency->classDate()->first();
        $class_date->update(['active' => true]);

        $registration = $frequency->registration()->first();
        $registration->update(['workload' => 0]);

        $frequency->update([
            'presence_a' => false,
            'presence_b' => false,
            'presence_c' => false,
            'presence_d' => false,
            'presence_e' => false,
            'presence_f' => false,
            'justified' => true
        ]);

        return redirect()->route('rooms');
    }

    public function document($image, $id, $size)
    {
        if (!is_null($image))
        {
            $file = $image;
            $extension = $image->getClientOriginalExtension();
            $file_name = md5($id) . '.' . $extension;
            $destination_path = public_path('images/documents/');

            $full_path = $destination_path . $file_name;

            if (!file_exists($destination_path)) {
                File::makeDirectory($destination_path, 0775);
            }

            $image = Image::make($file)->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image->save($full_path, 100);

            return $file_name;
        } else {
            return null;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $frequency = Frequency::find($id);
        $registration = $frequency->registration()->first();
        $class_date = $frequency->classDate()->first();

        return view('justifications.show', compact(['frequency', 'registration', 'class_date']));
    }
}
