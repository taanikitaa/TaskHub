<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KaryawanController;
use App\Http\Controllers\PembimbingController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\Auth\LoginController;

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
    return view('welcome');
});

Route::middleware('web')->group(function () {
    Auth::routes();
});

Route::get('/home/admin', [UserController::class, 'index'])->name('home.admin.index')->middleware('auth');
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::post('/users', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');
Route::get('/users/assign-role/{user}', [UserController::class, 'assignRoleForm'])->name('users.assignRoleForm')->middleware('auth');
Route::post('/users/{user}/assign-role', [UserController::class,'assignRole'])->name('users.assignRole')->middleware('auth');
Route::get('/users/search', [UserController::class, 'search'])->name('users.search');



Route::get('/home/jadwal', [JadwalController::class, 'index'])->name('home.jadwal.index')->middleware('auth');
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index')->middleware('auth');
Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store')->middleware('auth');
Route::get('/jadwal/{jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit')->middleware('auth');
Route::put('/jadwal/{jadwal}', [JadwalController::class, 'update'])->name('jadwal.update')->middleware('auth');
Route::delete('/jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy')->middleware('auth');
Route::get('/jadwal/karyawan', [JadwalController::class, 'karyawanJadwal'])->name('jadwal.karyawan')->middleware('auth');
Route::get('/jadwal/search', [JadwalController::class, 'search'])->name('jadwal.search');


Route::get('/home/karyawan', [KaryawanController::class, 'index'])->name('home.karyawan.index')->middleware('auth');
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index')->middleware('auth');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store')->middleware('auth');
Route::get('/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit')->middleware('auth');
Route::put('/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update')->middleware('auth');
Route::delete('/karyawan/{karyawan}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy')->middleware('auth');
Route::get('/karyawan/search', [KaryawanController::class, 'search'])->name('karyawan.search');


Route::get('/home/task', [TaskController::class, 'index'])->name('home.task.index')->middleware('auth');
Route::get('/task', [TaskController::class, 'index'])->name('task.index')->middleware('auth');
Route::post('/task', [TaskController::class, 'store'])->name('task.store')->middleware('auth');
Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit')->middleware('auth');
Route::put('/task/{task}', [TaskController::class, 'update'])->name('task.update')->middleware('auth');
Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy')->middleware('auth');
Route::get('/tasks/karyawan', [TaskController::class, 'karyawanTasks'])->name('tasks.karyawan')->middleware('auth');
Route::post('/report', [TaskController::class, 'report'])->name('task.report')->middleware('auth');
Route::get('/task/search', [TaskController::class, 'search'])->name('task.search');


Route::get('/home/report', [ReportController::class, 'index'])->name('home.report.index')->middleware('auth');
Route::get('/report', [ReportController::class, 'index'])->name('report.index')->middleware('auth');
Route::get('/report/{report}', [ReportController::class, 'show'])->name('report.show');
Route::get('/report/{report}/edit', [ReportController::class, 'edit'])->name('report.edit')->middleware('auth');
Route::put('/report/{report}', [ReportController::class, 'update'])->name('report.update')->middleware('auth');
Route::delete('/report/{report}', [ReportController::class, 'destroy'])->name('report.destroy')->middleware('auth');
Route::get('/report/search', [ReportController::class, 'search'])->name('report.search');



Route::get('/home/pembimbing', [PembimbingController::class, 'index'])->name('home.pembimbing.index')->middleware('auth');
Route::get('/pembimbing', [PembimbingController::class, 'index'])->name('pembimbing.index')->middleware('auth');
Route::post('/pembimbing', [PembimbingController::class, 'store'])->name('pembimbing.store')->middleware('auth');
Route::get('/pembimbing/{pembimbing}/edit', [PembimbingController::class, 'edit'])->name('pembimbing.edit')->middleware('auth');
Route::put('/pembimbing/{pembimbing}', [PembimbingController::class, 'update'])->name('pembimbing.update')->middleware('auth');
Route::delete('/pembimbing/{pembimbing}', [PembimbingController::class, 'destroy'])->name('pembimbing.destroy')->middleware('auth');
Route::get('/pembimbing/search', [PembimbingController::class, 'search'])->name('pembimbing.search');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
