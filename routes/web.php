<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RolesController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\permissionscontroller;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
// Route Redirects -> redirect to the login page
Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/*
|--------------------------------------------------------------------------
| Email Verification Routes
|--------------------------------------------------------------------------
*/

/*
 route which will tell the the user that they need to verify thier email by 
 clicking
link send to their email

*/
Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');


/*
The EmailVerificationRequest is a form request that is included with Laravel
 This request will automatically take care of validating the request's id and 
 hash parameters.
*/
Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();
    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

// Resending The Verification Email
Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

/*
|--------------------------------------------------------------------------
| End of Email Verification Routes
|--------------------------------------------------------------------------
*/
Route::group(['middleware' => ['auth']], function() {

Route::resource('users', UserController::class);
Route::resource('projects', ProjectController::class);
Route::resource('roles', RolesController::class);
Route::resource('clients', ClientsController::class);
Route::resource('permissions', permissionscontroller::class);


Route::get('/users/{id}/show_user_roles/',[UserController::class,'show_user_roles'])->name('show_user_roles');
Route::get('/deleted_projects',[ProjectController::class,'deleted_projects'])->name('projects-deleted');
Route::put('projects/{id}/restore_project',[ProjectController::class,'restore_project'])->name('restore-project');
Route::delete('projects/{id}/remove_project',[ProjectController::class,'remove_project'])->name('remove-project');
});

require __DIR__ . '/auth.php';
