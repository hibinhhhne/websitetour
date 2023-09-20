<?php

use App\Http\Controllers\HomepageController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;



Route::get('/admin/nguoi-dung', [HomepageController::class, 'view']);
Route::get('test-view', [TestController::class, 'view']);
// Route::get('/admin/nguoi-dung', NguoiDungController::class, 'index');
