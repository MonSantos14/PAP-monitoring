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
use App\Http\Controllers\Proposal\ProposalController;
use App\Http\Controllers\Proposal\UpdateProposalController;
use App\Http\Controllers\Proponent\ProponentController;
use App\Http\Controllers\Draft\DraftController; 
use App\Http\Controllers\SearchController;
use App\Http\Controllers\PDF\PDFController;


#AUTHENTICATION
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'store']);
Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

#COLLEGE ROUTES

//DASHBOARD
Route::get('/college/dashboard', [DashboardController::class, 'index'])->name('dashboard-college');

// PROPOSALS
Route::get('college/proposal/{proposal}', [ProposalController::class, 'collegeView'])->name('proposal-college');

// PROPOSALS FILE
Route::get('college/proposal/{proposal}/{file}', [ProposalController::class, 'fileView'])->name('proposal-view-college');

// FACULTY
Route::get('/college/faculty', [FacultyController::class, 'index'])->name('faculty-college');
// DELETE FACULTY
Route::delete('/college/faculty/{faculty}', [FacultyController::class, 'deleteFaculty'])->name('delete-faculty');
// CREATE FACULTY
Route::get('/college/faculty/create', [FacultyController::class, 'createView'])->name('create-faculty-college');
Route::post('/college/faculty/create', [FacultyController::class, 'createFaculty']);
// EDIT FACULTY
Route::get('/college/faculty/{faculty}/edit', [FacultyController::class, 'edit'])->name('edit-faculty-college');
Route::put('/college/faculty/{faculty}/edit', [FacultyController::class, 'update']);

// PROPONENT
Route::get('/college/proponent', [ProponentController::class, 'index'])->name('proponent-college');

// CREATE PROPONENT
Route::get('/college/create/proponent', [ProponentController::class, 'createView'])->name('create-proponent-college');
Route::post('/college/create/proponent', [ProponentController::class, 'createProponent']);

// Route::get('/faculty/edit/{id}', [FacultyController::class, 'edit'])->name('edit-faculty');
Route::put('/faculty/edit/{id}', [FacultyController::class, 'update']);


#PROPONENT ROUTES

// Dashboard
Route::get('/proponent/dashboard', [DashboardController::class, 'proponent'])->name('dashboard-proponent');
Route::post('/proponent/dashboard', [CreateProposalController::class, 'createProposal']);

// Proposal
Route::get('/proponent/proposal/{proposal}', [ProposalController::class, 'proponentView'])->name('proposal-view-proponent');

// Profile
Route::get('/proponent/profile/{user}', [ProponentController::class, 'view'])->name('profile-proponent');
Route::post('/proponent/profile/{user}', [ProponentController::class, 'update']);
// Profile Change Pass
Route::get('/proponent/profile/changepass', [ProponentController::class, 'changePw'])->name('changepw-proponent');
Route::put('/proponent/profile/changepass', [ProponentController::class, 'updatePw']);

// Draft Proposal
Route::get('/proponent/drafts', [DraftController::class, 'index'])->name('drafts-proponent');
Route::get('/draft/proposal/{proposal}', [DraftController::class, 'view'])->name('draft-proposal');












Route::get('/faculty/edit-image/{id}', [FacultyController::class, 'imageLayout'])->name('edit-image');
Route::put('/faculty/edit-image/{id}', [FacultyController::class, 'editImage']);

#CREATE PROPOSAL
Route::get('/create-proposal', [CreateProposalController::class, 'index'])->name('create-proposal');
Route::post('/create-proposal', [CreateProposalController::class, 'createProposal']);
 
#PROPOSAL STATUS
Route::patch('/proposal/{proposal}/status', [ProposalController::class, 'proposalStatus'])->name('status');

// PROPOSAL DASHBOARD
Route::get('/proposal/{proposal}', [ProposalController::class, 'view'])->name('proposal');

#ADD ENDORSEMENTD
Route::post('/proposal/{proposal}', [ProposalController::class, 'endorsement']);

#PROPOSAL REQUIREMENTS
Route::patch('/proposal/{proposal}', [ProposalController::class, 'approveCRP']);
Route::patch('/proposal/{proposal}', [ProposalController::class, 'declineCRP']);
Route::patch('/proposal/{proposal}/approve_CRP', [ProposalController::class, 'approveCRP'])->name('approve-CRP');
Route::patch('/proposal/{proposal}/decline_CRP', [ProposalController::class, 'declineCRP'])->name('decline-CRP');
Route::patch('/proposal/{proposal}/approve_LIB', [ProposalController::class, 'approveLIB'])->name('approve-LIB');
Route::patch('/proposal/{proposal}/decline_LIB', [ProposalController::class, 'declineLIB'])->name('decline-LIB');
Route::patch('/proposal/{proposal}/approve_CVP', [ProposalController::class, 'approveCVP'])->name('approve-CVP');
Route::patch('/proposal/{proposal}/decline_CVP', [ProposalController::class, 'declineCVP'])->name('decline-CVP');
Route::patch('/proposal/{proposal}/approve_SDRPM', [ProposalController::class, 'approveSDRPM'])->name('approve-SDRPM');
Route::patch('/proposal/{proposal}/decline_SDRPM', [ProposalController::class, 'declineSDRPM'])->name('decline-SDRPM');
Route::patch('/proposal/{proposal}/approve_CERT', [ProposalController::class, 'approveCERT'])->name('approve-CERT');
Route::patch('/proposal/{proposal}/decline_CERT', [ProposalController::class, 'declineCERT'])->name('decline-CERT');
Route::patch('/proposal/{proposal}/approve_WP', [ProposalController::class, 'approveWP'])->name('approve-WP');
Route::patch('/proposal/{proposal}/decline_WP', [ProposalController::class, 'declineWP'])->name('decline-WP');

#DRAFT
Route::get('/draft', [DraftController::class, 'index'])->name('draft');

Route::put('/draft/proposal/{proposal}', [DraftController::class, 'update']);
Route::patch('/draft/proposal/{proposal}', [DraftController::class, 'sendtorio']);
Route::get('/draft/proposal/{proposal}/add-members', [DraftController::class, 'editmembers'])->name('add-member-ui');
Route::post('/draft/proposal/{proposal}/add-members', [DraftController::class, 'addmember']);
Route::get('/draft/proposal/{proposal}/add-partners', [DraftController::class, 'editPartners'])->name('add-partner-ui');
Route::post('/draft/proposal/{proposal}/add-partners', [DraftController::class, 'addPartner']);
Route::get('/draft/proposal/{proposal}/add-leader', [DraftController::class, 'editLeader'])->name('add-leader-ui');
Route::put('/draft/proposal/{proposal}/add-leader', [DraftController::class, 'addLeader']);

#UPDATE PROPOSAL
Route::get('/proposal/{proposal}/update', [UpdateProposalController::class, 'view'])->name('proposal-update');

#PDF 
Route::get('/requirements/{id}', [PDFController::class, 'view'])->name('pdf');

Route::get('/', function(){
    return view('layouts.home');
})->name('home');

#PARTNERS
Route::get('/partners', [PartnersController::class, 'index'])->name('partners');
Route::post('/partners', [PartnersController::class, 'store']);
 