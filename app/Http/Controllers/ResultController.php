<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ResultController extends Controller
{
    public function create()
    {
        if (!auth()->user()->role == "admin") {
            return abort(403, 'Unauthorized action.');
        }
        $students = Student::all();
        return view('result.create', compact('students'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'student_id' => 'required|exists:students,id',
            'paper' => 'required|file|mimes:pdf|max:4096', // 4MB max
            'exam_date' => 'required|date',
        ]);

        // Store the file with original name
        if ($request->hasFile('paper')) {
            $file = $request->file('paper');
            $path = $file->storeAs(
                'results',
                'result_' . time() . '_' . $file->getClientOriginalName(),
                'public'
            );
            $validated['paper'] = $path;
        }

        Result::create($validated);

        return redirect()->back()->with('success', 'Result created successfully.');
    }


    public function form()
    {

        return view('result.form');
    }

    public function search(Request $request)
    {
        $request->validate([
            'name'            => 'required|string',
            'passport_number' => 'required|string',
            'date_of_birth'   => 'required|date',
            'exam_date'       => 'required|date',
        ]);

        $name = trim(strtolower($request->name));
        $passport = trim($request->passport_number);
        $dob = $request->date_of_birth;
        $examDate = $request->exam_date;

        $result = Result::whereDate('exam_date', $examDate)
            ->whereHas('student', function ($query) use ($name, $passport, $dob) {
                $query->whereRaw('LOWER(name) = ?', [$name])
                    ->where('passport_number', $passport)
                    ->whereDate('date_of_birth', $dob);
            })
            ->first();

        if (! $result) {
            return back()->withErrors(['message' => 'No matching record found.']);
        }

        return view('result.show', compact('result'));
    }

    public function download($id)
    {
        $result = Result::findOrFail($id);

        if (!Storage::disk('public')->exists($result->paper)) {
            abort(404);
        }

        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'attachment; filename="' . basename($result->paper) . '"',
        ];

        return Storage::disk('public')->download($result->paper, basename($result->paper), $headers);
    }
}
