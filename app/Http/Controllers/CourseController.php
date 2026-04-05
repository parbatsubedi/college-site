<?php

namespace App\Http\Controllers;

use App\Models\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::latest()->paginate(10);

        return view('admin.courses.index', compact('courses'));
    }

    public function create()
    {
        return view('admin.courses.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:courses,slug',
            'description' => 'required',
            'category' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'curriculum' => 'nullable',
            'instructor' => 'nullable|string|max:255',
            'study_mode' => 'nullable|string|max:255',
            'intake_months' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'cricos_code' => 'nullable|string|max:50',
            'core_units' => 'nullable|json',
            'elective_units' => 'nullable|json',
            'career_outcomes' => 'nullable|json',
            'entry_requirements' => 'nullable',
            'how_to_apply' => 'nullable',
            'international_requirements' => 'nullable',
            'fees_payment_info' => 'nullable',
            'policies_forms' => 'nullable',
            'is_published' => 'boolean',
        ]);

        $data = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->storeAs('courses', $imageName, 'public');
            $data['image'] = $imageName;
        }

        // Convert text fields to JSON arrays
        if ($request->has('core_units_text') && $request->core_units_text) {
            $lines = array_filter(array_map('trim', explode("\n", $request->core_units_text)));
            $data['core_units'] = json_encode(array_values($lines));
        }
        if ($request->has('elective_units_text') && $request->elective_units_text) {
            $lines = array_filter(array_map('trim', explode("\n", $request->elective_units_text)));
            $data['elective_units'] = json_encode(array_values($lines));
        }
        if ($request->has('career_outcomes_text') && $request->career_outcomes_text) {
            $lines = array_filter(array_map('trim', explode("\n", $request->career_outcomes_text)));
            $data['career_outcomes'] = json_encode(array_values($lines));
        }

        Course::create($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course created successfully');
    }

    public function show(Course $course)
    {
        return view('admin.courses.show', compact('course'));
    }

    public function edit(Course $course)
    {
        return view('admin.courses.edit', compact('course'));
    }

    public function update(Request $request, Course $course)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:courses,slug,'.$course->id,
            'description' => 'required',
            'category' => 'required|string|max:255',
            'duration' => 'required|integer|min:1',
            'fee' => 'required|numeric|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'curriculum' => 'nullable',
            'instructor' => 'nullable|string|max:255',
            'study_mode' => 'nullable|string|max:255',
            'intake_months' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:255',
            'cricos_code' => 'nullable|string|max:50',
            'core_units' => 'nullable|json',
            'elective_units' => 'nullable|json',
            'career_outcomes' => 'nullable|json',
            'entry_requirements' => 'nullable',
            'how_to_apply' => 'nullable',
            'international_requirements' => 'nullable',
            'fees_payment_info' => 'nullable',
            'policies_forms' => 'nullable',
            'is_published' => 'boolean',
        ]);

        $data = $request->except('image');

        // Handle image upload
        if ($request->hasFile('image')) {
            // Delete old image if exists
            if ($course->image) {
                Storage::disk('public')->delete('courses/'.$course->image);
            }
            $image = $request->file('image');
            $imageName = time().'_'.$image->getClientOriginalName();
            $image->storeAs('courses', $imageName, 'public');
            $data['image'] = $imageName;
        }

        // Convert text fields to JSON arrays
        if ($request->has('core_units_text') && $request->core_units_text) {
            $lines = array_filter(array_map('trim', explode("\n", $request->core_units_text)));
            $data['core_units'] = json_encode(array_values($lines));
        }
        if ($request->has('elective_units_text') && $request->elective_units_text) {
            $lines = array_filter(array_map('trim', explode("\n", $request->elective_units_text)));
            $data['elective_units'] = json_encode(array_values($lines));
        }
        if ($request->has('career_outcomes_text') && $request->career_outcomes_text) {
            $lines = array_filter(array_map('trim', explode("\n", $request->career_outcomes_text)));
            $data['career_outcomes'] = json_encode(array_values($lines));
        }

        $course->update($data);

        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully');
    }

    public function destroy(Course $course)
    {
        $course->delete();

        return redirect()->route('admin.courses.index')->with('success', 'Course deleted successfully');
    }
}
