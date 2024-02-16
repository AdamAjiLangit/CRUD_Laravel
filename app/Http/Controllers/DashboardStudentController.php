<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Gender;
use Illuminate\Http\Request;

class DashboardStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.students.index', [
            "title" => "Students",
            'students' => Student::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show($student)
    {
        return view('dashboard.students.detail', [
            "title" => "detail-student",
            "student" => Student::find($student)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $student = Student::find($id);
        return view('dashboard.students.edit', compact('student'), [
            'title' => 'Edit Student',
            'kelas' => Kelas::all(),
            'gender' => Gender::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());

        if ($request) {
            return redirect('/dashboard/students')->with('success', 'Student updated successfully!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Student $student)
    {
        $result = Student::destroy($student->id);
        if ($result) {
            return redirect('/dashboard/students')->with('success', 'Student deleted successfully!');
        }
    }
}
