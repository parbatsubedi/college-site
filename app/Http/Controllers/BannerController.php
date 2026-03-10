<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // For API
        if (request()->expectsJson()) {
            $banners = Banner::active()->get();
            return response()->json($banners);
        }
        
        // For admin view
        $banners = Banner::orderBy('order', 'asc')->get();
        return view('admin.banners.index', compact('banners'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string|max:500',
            'image_url' => 'nullable|string|url|max:500',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        Banner::create($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Banner created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        return response()->json($banner);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        return view('admin.banners.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string|max:500',
            'image_url' => 'nullable|string|url|max:500',
            'button_text' => 'nullable|string|max:50',
            'button_link' => 'nullable|string|max:255',
            'order' => 'nullable|integer|min:0',
            'is_active' => 'nullable|boolean',
        ]);

        $banner->update($validated);

        return redirect()->route('admin.dashboard')->with('success', 'Banner updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        $banner->delete();

        return redirect()->route('admin.dashboard')->with('success', 'Banner deleted successfully!');
    }
}

