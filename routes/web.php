<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\Hotelcontroller;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //logout
    Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('logout');

    //users
    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/user-store', [UserController::class, 'store'])->name('user.store');
    Route::put('/user-update', [UserController::class, 'update'])->name('user.update');
    Route::post('/remove-user', [UserController::class, 'removeUser'])->name('user.remove');
    Route::get('/getOneUser', [UserController::class, 'getOneUser']);

    //locations
    Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
    Route::get('/create-location', [LocationController::class, 'create'])->name('locations.create');
    Route::post('/store-location', [LocationController::class, 'store'])->name('locations.store');
    Route::post('/edit-location', [LocationController::class, 'edit'])->name('location.edit');
    Route::put('/update-location', [LocationController::class, 'update'])->name('location.update');
    Route::put('/deactivate-location', [LocationController::class, 'deactivate'])->name('location.deactivate');
    Route::get('/get-districts-by-province', [LocationController::class, 'getDistrictByProvince']);
    Route::get('/get-cities-by-district', [LocationController::class, 'getCityByDistrict']);
    Route::get('/get-one-city-by-id', [LocationController::class, 'getOneCityById']);

    //hotels
    Route::get('/hotels', [Hotelcontroller::class, 'index'])->name('hotels.index');
    Route::get('/create-hotel', [Hotelcontroller::class, 'create'])->name('hotels.create');
    Route::post('/store-hotel', [Hotelcontroller::class, 'store'])->name('hotels.store');
    Route::get('/edit-hotel', [Hotelcontroller::class, 'edit'])->name('hotels.edit');
    Route::put('/update-hotel', [Hotelcontroller::class, 'update'])->name('hotels.update');
    Route::post('remove', [Hotelcontroller::class, 'remove'])->name('hotel.remove');

    //facilities
    Route::post('store-facilities', [FacilitiesController::class, 'store'])->name('facilities.store');
    Route::get('edit-facilities', [FacilitiesController::class, 'edit'])->name('facilities.edit');
    Route::put('update-facilities', [FacilitiesController::class, 'update'])->name('facilities.update');

});

Route::get('/template', function () {
    return view('layouts.template');
});



require __DIR__.'/auth.php';
