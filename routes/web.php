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

Auth::routes();

Route::get('/home/admin', [UserController::class, 'index'])->name('home.admin.index');
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
Route::get('/users/assign-role/{user}', [UserController::class, 'assignRoleForm'])->name('users.assignRoleForm');
Route::post('/users/{user}/assign-role', [UserController::class,'assignRole'])->name('users.assignRole');


Route::get('/home/jadwal', [JadwalController::class, 'index'])->name('home.jadwal.index');
Route::get('/jadwal', [JadwalController::class, 'index'])->name('jadwal.index');
Route::post('/jadwal', [JadwalController::class, 'store'])->name('jadwal.store');
Route::get('/jadwal/{jadwal}/edit', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::put('/jadwal/{jadwal}', [JadwalController::class, 'update'])->name('jadwal.update');
Route::delete('/jadwal/{jadwal}', [JadwalController::class, 'destroy'])->name('jadwal.destroy');
Route::get('/jadwal/karyawan', [JadwalController::class, 'karyawanJadwal'])->name('jadwal.karyawan');

Route::get('/home/karyawan', [KaryawanController::class, 'index'])->name('home.karyawan.index');
Route::get('/karyawan', [KaryawanController::class, 'index'])->name('karyawan.index');
Route::post('/karyawan', [KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{karyawan}', [KaryawanController::class, 'show'])->name('karyawan.show');
Route::get('/karyawan/{karyawan}/edit', [KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::put('/karyawan/{karyawan}', [KaryawanController::class, 'update'])->name('karyawan.update');
Route::delete('/karyawan/{karyawan}', [KaryawanController::class, 'destroy'])->name('karyawan.destroy');

Route::get('/home/task', [TaskController::class, 'index'])->name('home.task.index');
Route::get('/task', [TaskController::class, 'index'])->name('task.index');
Route::post('/task', [TaskController::class, 'store'])->name('task.store');
Route::get('/task/{task}', [TaskController::class, 'show'])->name('task.show');
Route::get('/task/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
Route::put('/task/{task}', [TaskController::class, 'update'])->name('task.update');
Route::delete('/task/{task}', [TaskController::class, 'destroy'])->name('task.destroy');
Route::get('/tasks/karyawan', [TaskController::class, 'karyawanTasks'])->name('tasks.karyawan');
Route::post('/report', [TaskController::class, 'report'])->name('task.report');



Route::get('/home/report', [ReportController::class, 'index'])->name('home.report.index');
Route::get('/report', [ReportController::class, 'index'])->name('report.index');
Route::get('/report/{report}', [ReportController::class, 'show'])->name('report.show');
Route::get('/report/{report}/edit', [ReportController::class, 'edit'])->name('report.edit');
Route::put('/report/{report}', [ReportController::class, 'update'])->name('report.update');
Route::delete('/report/{report}', [ReportController::class, 'destroy'])->name('report.destroy');

Route::get('/home/pembimbing', [PembimbingController::class, 'index'])->name('home.pembimbing.index');
Route::get('/pembimbing', [PembimbingController::class, 'index'])->name('pembimbing.index');
Route::post('/pembimbing', [PembimbingController::class, 'store'])->name('pembimbing.store');
Route::get('/pembimbing/{pembimbing}', [PembimbingController::class, 'show'])->name('pembimbing.show');
Route::get('/pembimbing/{pembimbing}/edit', [PembimbingController::class, 'edit'])->name('pembimbing.edit');
Route::put('/pembimbing/{pembimbing}', [PembimbingController::class, 'update'])->name('pembimbing.update');
Route::delete('/pembimbing/{pembimbing}', [PembimbingController::class, 'destroy'])->name('pembimbing.destroy');


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');