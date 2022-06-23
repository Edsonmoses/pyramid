<?php

use App\Http\Livewire\User\AboutUsComponent;
use App\Http\Livewire\User\ContactUsComponent;
use App\Http\Livewire\User\HomeComponent;
use App\Http\Livewire\User\NowSellingComponent;
use App\Http\Livewire\User\OurProjectsComponent;
use Illuminate\Support\Facades\Route;

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

Route::get('/', HomeComponent::class);
Route::get('/about-us', AboutUsComponent::class);
Route::get('/now-selling', NowSellingComponent::class);
Route::get('/our-projects', OurProjectsComponent::class);
Route::get('/contact-us', ContactUsComponent::class);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
