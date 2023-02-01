<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Teacher::all();
        return response()->json($rows);
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
        //
        try {
            $teacher = new Teacher;
            $teacher->dni = $request->dni;
            $teacher->name = $request->name;
            $teacher->last_name = $request->last_name;
            $teacher->phone = $request->phone;
            $teacher->email = $request->email;
            $teacher->address = $request->address;
            $teacher->city = $request->city;
            $teacher->save();
        } catch (\Exception $e) {

            $data = [
                'message' => 'Prece que hubo un problema',
                'error' => $e->getMessage()
            ];
            return response()->json($data);
        }


        $data = [
            'message' => 'Registro creado satisfactoriamente',
            'teacher' => $teacher
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function show(Teacher $teacher)
    {
        //

        $data = [
            'message' => 'Detalles del maestro: ' . $teacher->name . ' ' . $teacher->last_name,
            'teacher' => $teacher,
            'subjects' => $teacher->subjects
        ];

        return response()->json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Teacher $teacher)
    {
        //
        try {
            $teacher->dni = $request->dni;
            $teacher->name = $request->name;
            $teacher->last_name = $request->last_name;
            $teacher->phone = $request->phone;
            $teacher->email = $request->email;
            $teacher->address = $request->address;
            $teacher->city = $request->city;
            $teacher->save();
        } catch (\Exception $e) {

            $data = [
                'message' => 'Prece que hubo un problema',
                'error' => $e->getMessage()
            ];
            return response()->json($data);
        }

        $data = [
            'message' => 'Registro modificado satisfactoriamente',
            'teacher' => $teacher
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teacher $teacher)
    {
        //
        $teacher->delete();
        $data = [
            'message' => 'Registro eliminado satisfactoriamente',
            'teacher' => $teacher
        ];
        return response()->json($data);
    }

    public function attach(Request $request)
    {
        $teacher = Teacher::find($request->teacher_id);
        $teacher->subjects()->attach($request->subject_id);
        $data = [
            'message' => 'La asignatura fue actualizada con su nuevo docente.',
            'teacher' => $teacher
        ];
        return response()->json($data);
    }
}
