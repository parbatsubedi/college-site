<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContactMessageController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\SettingsController;
use Illuminate\Support\Facades\Route;

Route::get('/home-oldd', [HomeController::class, 'index'])->name('home');
Route::get('/', [HomeController::class, 'indexNew'])->name('home.new');
Route::get('/courses', [HomeController::class, 'courses'])->name('courses');
Route::get('/courses/{slug}', [HomeController::class, 'courseShow'])->name('courses.show');
Route::get('/admissions', [HomeController::class, 'admissions'])->name('admissions');
Route::get('/events', [HomeController::class, 'events'])->name('events');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/settings', [SettingsController::class, 'index'])->name('settings.index');
    Route::put('/settings', [SettingsController::class, 'update'])->name('settings.update');
    Route::get('/profile/edit', [AdminController::class, 'editProfile'])->name('profile.edit');
    Route::put('/profile/update', [AdminController::class, 'updateProfile'])->name('profile.update');

    // Route::resource('pages', PageController::class);
    // Route::resource('announcements', AnnouncementController::class);
    // Route::resource('events', EventController::class);
    // Route::resource('courses', CourseController::class);
    // Route::resource('galleries', GalleryController::class);
    // Route::resource('applications', ApplicationController::class);
    Route::get('pages', [PageController::class, 'index'])->name('pages.index');
    Route::get('pages/create', [PageController::class, 'create'])->name('pages.create');
    Route::post('pages', [PageController::class, 'store'])->name('pages.store');
    Route::get('pages/{page}', [PageController::class, 'show'])->name('pages.show');
    Route::get('pages/{page}/edit', [PageController::class, 'edit'])->name('pages.edit');
    Route::put('pages/{page}', [PageController::class, 'update'])->name('pages.update');
    Route::delete('pages/{page}', [PageController::class, 'destroy'])->name('pages.destroy');

    Route::get('announcements', [AnnouncementController::class, 'index'])->name('announcements.index');
    Route::get('announcements/create', [AnnouncementController::class, 'create'])->name('announcements.create');
    Route::post('announcements', [AnnouncementController::class, 'store'])->name('announcements.store');
    Route::get('announcements/{announcement}', [AnnouncementController::class, 'show'])->name('announcements.show');
    Route::get('announcements/{announcement}/edit', [AnnouncementController::class, 'edit'])->name('announcements.edit');
    Route::put('announcements/{announcement}', [AnnouncementController::class, 'update'])->name('announcements.update');
    Route::delete('announcements/{announcement}', [AnnouncementController::class, 'destroy'])->name('announcements.destroy');

    Route::get('events', [EventController::class, 'index'])->name('events.index');
    Route::get('events/create', [EventController::class, 'create'])->name('events.create');
    Route::post('events', [EventController::class, 'store'])->name('events.store');
    Route::get('events/{event}', [EventController::class, 'show'])->name('events.show');
    Route::get('events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
    Route::put('events/{event}', [EventController::class, 'update'])->name('events.update');
    Route::delete('events/{event}', [EventController::class, 'destroy'])->name('events.destroy');

    Route::get('courses', [CourseController::class, 'index'])->name('courses.index');
    Route::get('courses/create', [CourseController::class, 'create'])->name('courses.create');
    Route::post('courses', [CourseController::class, 'store'])->name('courses.store');
    Route::get('courses/{course}', [CourseController::class, 'show'])->name('courses.show');
    Route::get('courses/{course}/edit', [CourseController::class, 'edit'])->name('courses.edit');
    Route::put('courses/{course}', [CourseController::class, 'update'])->name('courses.update');
    Route::delete('courses/{course}', [CourseController::class, 'destroy'])->name('courses.destroy');

    Route::get('galleries', [GalleryController::class, 'index'])->name('galleries.index');
    Route::get('galleries/create', [GalleryController::class, 'create'])->name('galleries.create');
    Route::post('galleries', [GalleryController::class, 'store'])->name('galleries.store');
    Route::get('galleries/{gallery}', [GalleryController::class, 'show'])->name('galleries.show');
    Route::get('galleries/{gallery}/edit', [GalleryController::class, 'edit'])->name('galleries.edit');
    Route::put('galleries/{gallery}', [GalleryController::class, 'update'])->name('galleries.update');
    Route::delete('galleries/{gallery}', [GalleryController::class, 'destroy'])->name('galleries.destroy');

    Route::get('applications', [ApplicationController::class, 'index'])->name('applications.index');
    Route::get('applications/{application}', [ApplicationController::class, 'show'])->name('applications.show');
    Route::delete('applications/{application}', [ApplicationController::class, 'destroy'])->name('applications.destroy');
    Route::put('applications/{application}/status', [ApplicationController::class, 'updateStatus'])->name('applications.updateStatus');

    Route::get('contact-messages', [ContactMessageController::class, 'index'])->name('contact-messages.index');
    Route::get('contact-messages/{contactMessage}', [ContactMessageController::class, 'show'])->name('contact-messages.show');
    Route::delete('contact-messages/{contactMessage}', [ContactMessageController::class, 'destroy'])->name('contact-messages.destroy');
});

Route::get('/welcome', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';
