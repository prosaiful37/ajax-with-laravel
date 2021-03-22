<?php

namespace App\Http\Controllers;

use App\Models\student;
use Illuminate\Http\Request;
use PHPUnit\TextUI\XmlConfiguration\CodeCoverage\Report\Php;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = student::all();
        return view ('student.index', [
            'all_data' => $data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        if ($request -> hasfile('photo') ) {
            $img = $request -> file('photo');
            $unique_name = md5(time().rand()) .'.'. $img -> getClientOriginalExtension();
            $img -> move(public_path('media/students'), $unique_name);
        }

        student::create([
            'name' => $request -> name,
            'roll' => $request -> roll,
            'email' => $request -> email,
            'cell' => $request -> cell,
            'photo' => $unique_name,
        ]);


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = student::find($id);

        return [
            'name'  => $data -> name,
            'roll'  => $data -> roll,
            'email'  => $data -> email,
            'cell'  => $data -> cell,
            'photo'  => $data -> photo,

        ];

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
