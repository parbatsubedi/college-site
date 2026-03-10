@extends('admin.layouts.master')

@section('title', 'Edit Banner')

@section('content')
<div class="container mx-auto px-4 py-8">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold">Edit Banner</h1>
        <a href="{{ route('admin.banners.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg">
            Back to List
        </a>
    </div>

    <form action="{{ route('admin.banners.update', $banner->id) }}" method="POST" class="bg-white rounded-lg shadow p-6">
        @csrf
        @method('PUT')
        
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Title -->
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                <input type="text" name="title" value="{{ old('title', $banner->title) }}" required
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('title')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Subtitle -->
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                <input type="text" name="subtitle" value="{{ old('subtitle', $banner->subtitle) }}"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('subtitle')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Description -->
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" rows="3"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">{{ old('description', $banner->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image URL -->
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Image URL (External)</label>
                <input type="url" name="image_url" value="{{ old('image_url', $banner->image_url) }}" placeholder="https://example.com/image.jpg"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('image_url')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Image Path -->
            <div class="col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Image Path (Local)</label>
                <input type="text" name="image_path" value="{{ old('image_path', $banner->image_path) }}" placeholder="banners/filename.jpg"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('image_path')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button Text -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                <input type="text" name="button_text" value="{{ old('button_text', $banner->button_text) }}" placeholder="Learn More"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('button_text')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Button Link -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                <input type="text" name="button_link" value="{{ old('button_link', $banner->button_link) }}" placeholder="#about"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('button_link')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Order -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Display Order</label>
                <input type="number" name="order" value="{{ old('order', $banner->order) }}" min="0"
                    class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                @error('order')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Status -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                <select name="is_active" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                    <option value="1" {{ old('is_active', $banner->is_active) == 1 ? 'selected' : '' }}>Active</option>
                    <option value="0" {{ old('is_active', $banner->is_active) == 0 ? 'selected' : '' }}>Inactive</option>
                </select>
                @error('is_active')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                Update Banner
            </button>
        </div>
    </form>
</div>
@endsection

