<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Middleware\IsAdmin;

Route::get('/', function () {
    return view('auth.register');
});
Route::get('/not-found', function () {
    return view('404');
});
// This is for user
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/user', function () {
        //This is for admin interface
        if (Auth::user()->is_admin) {
            return view('auth.Admin');
        }
        //This is for user interface
        return view('auth.user');
    });

    Route::get('/admin', function () {
        //This is for admin interface
        if (Auth::user()->is_admin) {
            return view('auth.Admin');
        } else {
            return redirect('/not-found');
        }
    });

    Route::get('/add-item', function () {
        if (Auth::user()->is_admin) {
            return view('admin.add-item');
        } else {
            return redirect('/not-found');
        }
    });
});
