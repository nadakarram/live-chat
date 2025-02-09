<?php

use App\Livewire\Auth\GetEmail;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Passwordrest;
use App\Livewire\Auth\Regester;
use App\Livewire\Chating;
use App\Livewire\Home;
use App\Livewire\PasswordChanged;
use App\Livewire\Privatechat;
use App\Livewire\Profile;
use App\Livewire\ProfileEdting;
use App\Livewire\Rooms;
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
Route::middleware('auth')->group(function () {

    Route::get("/logout", function () {
      Auth::logout();
  
      return redirect('/login');
  
    });
    Route::get("/",Home::class);
    Route::get("/rooms",Rooms::class);
    Route::get("/chating/{room_id}",Chating::class);
    Route::get("privatechating/{user_id}",Privatechat::class);
    Route::get("/profile",Profile::class);
    Route::get("/profileedit/{user}",ProfileEdting::class);
  });

Route::middleware("guest")->group(function () {
    Route::get('/signup', Regester::class)->name("regester");
    Route::get('/login', Login::class)->name("login");
    Route::get("/changepassword/{email}", Passwordrest::class);
    Route::get("/forgetpassword", GetEmail::class);
    Route::get("/completed", PasswordChanged::class);

  });
