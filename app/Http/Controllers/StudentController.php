<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return inertia('Students/Index', compact('students'));
    }

    public function create()
    {
        return inertia('Students/Create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'age' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $student = new Student();
        $student->name = $request->name;
        $student->age = $request->age;
        $student->status = $request->status;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/students');
            $student->image = $imagePath;
        }

        $student->save();

        return redirect()->route('students.index');
    }

    public function show(Student $student)
    {
        return inertia('Students/Show', compact('student'));
    }

    public function edit(Student $student)
    {
        return inertia('Students/Edit', compact('student'));
    }

    public function update(Request $request, Student $student)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'age' => 'required|integer|min:0',
            'status' => 'required|in:active,inactive',
        ]);

        $student->name = $request->name;
        $student->age = $request->age;
        $student->status = $request->status;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images/students');
            $student->image = $imagePath;
        }

        $student->save();

        return redirect()->route('students.index');
    }

    public function destroy(Student $student)
    {
        $student->delete();
        return redirect()->route('students.index');
    }
}
