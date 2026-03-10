<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Event;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function indexNew()
    {
        return view('pages.home-new');
    }

    public function courses(Request $request)
    {
        $category = $request->query('category');

        $query = Course::where('is_published', true);

        if ($category) {
            $query->where('category', $category);
        }

        $courses = $query->orderBy('name')->get();

        return view('pages.courses', compact('courses'));
    }

    public function courseShow($slug)
    {
        $course = Course::where('slug', $slug)->firstOrFail();

        return view('pages.courses-show', compact('course'));
    }

    public function admissions(Request $request)
    {
        $selectedCourse = null;
        $courses = Course::where('is_published', true)->orderBy('name')->get();

        if ($request->has('course_id') && $request->course_id) {
            $selectedCourse = Course::find($request->course_id);
        }

        return view('pages.admissions', compact('courses', 'selectedCourse'));
    }

    public function events()
    {
        $events = Event::where('is_published', true)
            ->where('start_date', '>=', now())
            ->orderBy('start_date')
            ->get();

        return view('pages.events', compact('events'));
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
