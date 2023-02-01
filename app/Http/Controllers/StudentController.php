<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $rows = Student::all();
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
            $student = new Student;
            $student->dni = $request->dni;
            $student->name = $request->name;
            $student->inscription_date = Carbon::parse($request->inscription_date)->format('Y-m-d');
            $student->last_name = $request->last_name;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->semester = $request->semester;
            $student->save();
        } catch (\Exception $e) {

            $data = [
                'message' => 'Prece que hubo un problema',
                'error' => $e->getMessage()
            ];
            return response()->json($data);
        }

        $data = [
            'message' => 'Registro creado satisfactoriamente',
            'student' => $student
        ];
        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
        return response()->json($student);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {

        try {
            $student->dni = $request->dni;
            $student->name = $request->name;
            $student->inscription_date = $request->inscription_date;
            $student->last_name = $request->last_name;
            $student->phone = $request->phone;
            $student->email = $request->email;
            $student->address = $request->address;
            $student->semester = $request->semester;
            $student->save();
        } catch (\Exception $e) {

            $data = [
                'message' => 'Prece que hubo un problema',
                'error' => $e->getMessage()
            ];
            return response()->json($data);
        }

        $data = [
            'message' => 'Registro modificado satisfactoriamente',
            'teacher' => $student
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $student->delete();
        $data = [
            'message' => 'Registro eliminado satisfactoriamente',
            'teacher' => $student
        ];
        return response()->json($data);
    }
}
