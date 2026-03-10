<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\Application;
use App\Models\Course;
use App\Models\Event;
use App\Models\Gallery;
use App\Models\Page;
use App\Models\PageView;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard()
    {
        $stats = [
            'total_pages' => Page::count(),
            'total_announcements' => Announcement::count(),
            'total_events' => Event::count(),
            'total_courses' => Course::count(),
            'total_galleries' => Gallery::count(),
            'total_applications' => Application::count(),
            'pending_applications' => Application::where('status', 'pending')->count(),
            'approved_applications' => Application::where('status', 'approved')->count(),
            'rejected_applications' => Application::where('status', 'rejected')->count(),
        ];

        $recentApplications = Application::latest()->take(5)->get();
        $recentPageViews = PageView::latest()->take(10)->get();

        $pageViewsToday = PageView::whereDate('created_at', today())->count();
        $pageViewsThisWeek = PageView::whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])->count();
        $pageViewsThisMonth = PageView::whereMonth('created_at', now()->month)->count();

        $pageViewsByPage = PageView::selectRaw('page, count(*) as count')
            ->groupBy('page')
            ->orderByDesc('count')
            ->limit(10)
            ->get();

        return view('admin.dashboard', compact(
            'stats',
            'recentApplications',
            'recentPageViews',
            'pageViewsToday',
            'pageViewsThisWeek',
            'pageViewsThisMonth',
            'pageViewsByPage'
        ));
    }

    public function editProfile()
    {
        $user = Auth::user();

        return view('admin.profile.edit', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return redirect()->route('admin.profile.edit')->with('success', 'Profile updated successfully');
    }
}
