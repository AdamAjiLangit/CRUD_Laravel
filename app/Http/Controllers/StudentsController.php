<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use App\Models\Kelas;
use App\Models\Gender;



class StudentsController extends Controller
{
    public function index(Request $request)
    {
        $genderOptions = Gender::all(); // Ambil semua gender untuk opsi dropdown

        $selectedGender = $request->input('gender_id'); // Ambil gender yang dipilih dari form

        $students = Student::when($selectedGender, function ($query) use ($selectedGender) {
            return $query->where('gender_id', $selectedGender);
        })
            ->latest()
            ->filter(request(['search']))
            ->paginate(5)
            ->appends(['gender_id' => $selectedGender]); // Append filter parameters to pagination links

        return view('student.all', [
            "title" => "Students",
            'gender' => Gender::all(),
            "students" => $students,
            "selectedGender" => $selectedGender, // Add this line to ensure it's always defined
        ]);
    }

    public function show($student)
    {
        return view('student.detail', [
            "title" => "detail-student",
            "student" => Student::find($student)
        ]);
    }

    public function create()
    {
        return view('student.create', [
            'title' => 'Add Student',
            'kelas' => Kelas::all(),
            'gender' => Gender::all(),
        ]);
    }

    public function edit($id)
    {
        $student = Student::find($id);
        return view('student.edit', compact('student'), [
            'title' => 'Edit Student',
            'kelas' => Kelas::all(),
            'gender' => Gender::all(),
        ]);
    }

    public function update(Request $request, $id)
    {
        $student = Student::find($id);
        $student->update($request->all());

        if ($request) {
            return redirect('/student/all')->with('success', 'Student updated successfully!');
        }
    }

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
            return redirect('/student/all')->with('success', 'Student added successfully!');
        }

    }
    public function destroy(Student $student)
    {
        $result = Student::destroy($student->id);
        if ($result) {
            return redirect('/student/all')->with('success', 'Student deleted successfully!');
        }
    }
}
