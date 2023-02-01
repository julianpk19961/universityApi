<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $subjects = Subject::all();
        return response()->json($subjects);
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
            $subject = new Subject;
            $subject->name = $request->name;
            $subject->description = $request->description;
            $subject->academic_credits = $request->academic_credits;
            $subject->area = $request->area;
            $subject->elective = $request->elective;
            $subject->save();
        } catch (\Exception $e) {
            $data = [
                'message' => 'Prece que hubo un problema',
                'subject' => $e->getMessage()
            ];
            return response()->json($data);
        }


        $data = [
            'message' => 'Registro creado satisfactoriamente',
            'subject' => $subject
        ];

        return response()->json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
        return response()->json($subject);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
        try {
            $subject->name = $request->name;
            $subject->description = $request->description;
            $subject->academic_credits = $request->academic_credits;
            $subject->area = $request->area;
            $subject->elective = $request->elective;
            $subject->save();
        } catch (\Exception $e) {

            $data = [
                'message' => 'Prece que hubo un problema',
                'error' => $e->getMessage()
            ];
            return response()->json($data);
        }

        $data = [
            'message' => 'Registro actualizado satisfactoriamente',
            'subject' => $subject
        ];

        return response()->json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
        $subject->delete();
        $data = [
            'message' => 'Registro eliminado satisfactoriamente',
            'subject' => $subject
        ];

        return response()->json($data);
    }
}
