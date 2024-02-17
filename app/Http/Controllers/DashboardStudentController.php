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
    public function index(Request $request)
    {
        $selectedGender = $request->input('gender_id');
        $searchTerm = $request->input('search');

        $students = Student::when($selectedGender, function ($query) use ($selectedGender) {
            return $query->where('gender_id', $selectedGender);
        })
            ->when($searchTerm, function ($query) use ($searchTerm) {
                $query->where(function ($query) use ($searchTerm) {
                    $query->where('nama', 'like', '%' . $searchTerm . '%');
                });
            })
            ->latest()
            ->get();

        return view('dashboard.students.index', [
            "title" => "Students",
            'gender' => Gender::all(),
            "students" => $students,
            "selectedGender" => $selectedGender,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.students.create', [
            'title' => 'Add Student',
            'kelas' => Kelas::all(),
            'gender' => Gender::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nis' => 'required|max:255',
            'nama' => 'required|max:255',
            'tanggal_lahir' => 'required',
            'kelas_id' => 'required',
            'gender_id' => 'required',
            'alamat' => 'required',
        ]);

        $result = Student::create($validatedData);

        if ($result) {
            return redirect('/dashboard/students')->with('success', 'Student added successfully!');
        }
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
