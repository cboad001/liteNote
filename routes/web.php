<?php

use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\NoteBookController;
use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TrashedController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\NewPasswordController;


Route::get('/', function () {
    return view('welcome');
});

//Route::get('/dashboard', function () {
//    return view('dashboard');
//})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//Route::get('/reset-password', function () {
//    $data= [
//        'title' => 'Reset Password',
//        'content' => 'Reset Password body'
//    ];
//    Mail::send('auth.reset-password', $data, function ($message) {
//        $message->to(request('email'))->subject('Reset Password');
//    });
//});
Route::resource('notes', NoteController::class)->middleware('auth');//for only logged in users
Route::resource('notebooks', NotebookController::class)->middleware('auth');

Route::get('/trashed', [TrashedController::class, 'index'])->middleware('auth')->name('trashed.index');
//Route::get('/notebooks/{notebook}', [NotebookController::class, 'displayNote'])->name('notebooks.displayNote')->middleware('auth');

//Route::get('/trashed/{note}', [TrashedController::class, 'show'])->name('trashed.show')->middleware('auth')->withTrashed();
//Route::put('/trashed/{note}', [TrashedController::class, 'update'])->name('trashed.update')->middleware('auth')->withTrashed();
//Route::delete('/trashed/{note}', [TrashedController::class, 'destroy'])->name('trashed.destroy')->middleware('auth')->withTrashed();

Route::prefix('/trashed')->name('trashed.')->middleware('auth')->group(function () {
    Route::get('/', [TrashedController::class, 'index'])->name('index');
    Route::delete('/{note}', [TrashedController::class, 'destroy'])->name('destroy')->withTrashed();
    Route::get('/{note}', [TrashedController::class, 'show'])->name('show')->withTrashed();
    Route::put('/{note}', [TrashedController::class, 'update'])->name('update')->withTrashed();
});


Route::get('/forgot-password', [PasswordResetLinkController::class, 'create'])
    ->middleware('guest')
    ->name('password.request');

Route::post('/forgot-password', [PasswordResetLinkController::class, 'store'])
    ->middleware('guest')
    ->name('password.email');


Route::get('/reset-password/{token}', [NewPasswordController::class, 'create'])
    ->middleware('guest')
    ->name('password.reset');

Route::post('/reset-password', [NewPasswordController::class, 'store'])
    ->middleware('guest')
    ->name('password.store');


//Route::resource('trashed', TrashedController::class)->middleware('auth')->withTrashed();

//create

//store

//update

