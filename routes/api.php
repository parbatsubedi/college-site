<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\ContactMessageController;
use Illuminate\Support\Facades\Route;

Route::post('applications', [ApplicationController::class, 'store']);
Route::post('contact-messages', [ContactMessageController::class, 'store']);
