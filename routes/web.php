<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Faculty\FacultyController;
use App\Http\Controllers\Faculty\EditFacultyController;
use App\Http\Controllers\Partners\PartnersController;
use App\Http\Controllers\Proposal\CreateProposalController;
use App\Http\Controllers\Draft\DraftController;
use App\Http\Controllers\SearchController;

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

#AUTHENTICATION
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

#FACULTY
Route::get('/faculty', [FacultyController::class, 'index'])->name('faculty');
Route::post('/faculty', [FacultyController::class, 'createFaculty']);

Route::get('/faculty/edit/{id}', [FacultyController::class, 'edit'])->name('edit-faculty');
Route::put('/faculty/edit/{id}', [FacultyController::class, 'update']);

Route::get('/faculty/edit-image/{id}', [FacultyController::class, 'imageLayout'])->name('edit-image');
Route::put('/faculty/edit-image/{id}', [FacultyController::class, 'editImage']);

#PROPOSAL
Route::get('/create-proposal', [CreateProposalController::class, 'index'])->name('create-proposal');
Route::post('/create-proposal', [CreateProposalController::class, 'createProposal']);
// Route::get('/create-proposal-2', [CreateProposalController::class, 'addMembers'])->name('add-members');
// Route::post('/create-proposal-2/{id}', [CreateProposalController::class, 'addMember'])->name('add-member');
// Route::post('/create-proposal-add-member/{id}', [CreateProposalController::class, 'addMember'])->name('add-member');

#DRAFT
Route::get('/draft', [DraftController::class, 'index'])->name('draft');
Route::get('/draft/proposal/{id}', [DraftController::class, 'view'])->name('draft-proposal');
Route::put('/draft/proposal/{proposal}', [DraftController::class, 'update'])->name('draft-proposal');
Route::get('/draft/proposal/{proposal}/add-members', [DraftController::class, 'editmembers'])->name('add-member-ui');
Route::post('/draft/proposal/{proposal}/add-members', [DraftController::class, 'addmember']);
Route::get('/draft/proposal/{proposal}/add-partners', [DraftController::class, 'editPartners'])->name('add-partner-ui');
Route::post('/draft/proposal/{proposal}/add-partners', [DraftController::class, 'addPartner']);

Route::get('/', function(){
    return view('layouts.home');
})->name('home');

Route::get('/proposal', function () {
    return view('proposal.index');
});

#PARTNERS
Route::get('/partners', [PartnersController::class, 'index'])->name('partners');
Route::post('/partners', [PartnersController::class, 'store']);
 