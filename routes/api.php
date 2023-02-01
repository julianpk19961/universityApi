<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::controller(TeacherController::class)->group(function () {

    Route::get('/Profesores', 'index')->name('teachersIndex');
    Route::post('/Profesores', 'store')->name('teachersStore');
    Route::get('/Profesores/{teacher}', 'show')->name('teachersShow');
    Route::put('/Profesores/{teacher}', 'update')->name('teachersUpdate');
    Route::delete('/Profesores/{teacher}', 'destroy')->name('teachersDestroy');
    Route::post('/Profesores/Asignaturas', 'attach')->name('teacherAttach');
});


Route::controller(StudentController::class)->group(function () {

    Route::get('/Estudiantes', 'index')->name('studentsIndex');
    Route::post('/Estudiantes', 'store')->name('studentsStore');
    Route::get('/Estudiantes/{student}', 'show')->name('studentsShow');
    Route::put('/Estudiantes/{student}', 'update')->name('studentsUpdate');
    Route::delete('/Estudiantes/{student}', 'destroy')->name('studentsDestroy');
});

Route::controller(SubjectController::class)->group(function () {

    Route::get('/Asignaturas', 'index')->name('SubjectsIndex');
    Route::post('/Asignaturas', 'store')->name('SubjectsStore');
    Route::get('/Asignaturas/{subject}', 'show')->name('SubjectsShow');
    Route::put('/Asignaturas/{subject}', 'update')->name('SubjectsUpdate');
    Route::delete('/Asignaturas/{subject}', 'destroy')->name('SubjectsDestroy');
});
