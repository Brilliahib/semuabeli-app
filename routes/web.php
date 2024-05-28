<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Models\Category;
use App\Models\Project;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $category = Category::latest()->take(4)->get();
    $project = Project::latest()->take(4)->get();
    return view('home', [
        'title' => "SemuaBeli | Creative Solution at Your Hand",
        'projects' => $project,
        'category'=> $category
    ]);
});
Route::get('/template', [ProjectController::class, 'index']);
Route::get('/login',[LoginController::class, 'index'])->middleware('guest');
Route::post('/login',[LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index']);
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');
Route::get('/dashboard/project', [DashboardController::class, 'myproject'])->middleware('auth');
Route::get('/dashboard/setting', [DashboardController::class, 'setting'])->middleware('auth');
Route::get('/dashboard/setting/update-profile', [DashboardController::class, 'setting_profile'])->middleware('auth');
Route::put('/dashboard/setting/update-profile', [DashboardController::class, 'update'])->middleware('auth');
Route::get('/project/{slug}', [ProjectController::class, 'show']);
Route::get('/download/{file}', [ProjectController::class, 'download'])->name('download');
Route::fallback(function () {
    return view('404', [
        'title' => '404'
    ]);
});

