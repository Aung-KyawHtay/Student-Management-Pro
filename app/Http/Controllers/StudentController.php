<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\ErrorHandler\Error\UndefinedFunctionError;

class StudentController extends Controller
{
    public function index()
    {
        //$students = Student::all();
        // $students = Student::limit(5)->get();
        //reverse -> latest()->
        $students = Student::paginate(5);

        return view('students.index', compact('students'));
    }

    public function create()
    {
        return view('students.create');
    }

    public function edit(int $id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);
        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image') //Laravel UploadedFile object ယူ
                ->store('students', 'public');
        }

        Student::create($validated);

        return redirect('/students')
            ->with('success', 'Student added successfully!');
    }

    public function update(Request $request, Student $student)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')
                ->store('students', 'public');
        }

        $student->update($validated);

        return redirect()
            ->route('students.index')
            ->with('success', 'Student updated successfully.');
    }

    public function destroy(int $id)
    {
        $student = Student::findOrFail($id);

        $student->delete();

        return redirect('/students')
            ->with('success', 'Student deleted successully!');
    }
}
