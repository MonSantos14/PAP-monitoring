<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Faculty\FacultyController;
use App\Http\Controllers\Proposal\CreateProposalController;
use App\Http\Controllers\Proposal\DraftController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty');
Route::post('/faculty', [FacultyController::class, 'createFaculty']);

Route::get('/create-proposal', [CreateProposalController::class, 'index'])->name('create-proposal');
Route::post('/create-proposal', [CreateProposalController::class, 'createProposal']);

Route::get('/draft', [DraftController::class, 'index'])->name('draft');

Route::get('/', function(){
    return view('layouts.home');
})->name('home');

Route::get('/proposal', function () {
    return view('proposal.index');
});
