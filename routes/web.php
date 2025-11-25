<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\Hotelcontroller;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageRouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TouristController;
use App\Http\Controllers\TouristHealthController;
use App\Http\Controllers\TourRequestController;
use App\Http\Controllers\UserController;
use App\Models\TouristHealth;
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
    Route::get('/getLocations', [LocationController::class, 'getLocations']);

    //hotels
    Route::get('/hotels', [Hotelcontroller::class, 'index'])->name('hotels.index');
    Route::get('/create-hotel', [Hotelcontroller::class, 'create'])->name('hotels.create');
    Route::post('/store-hotel', [Hotelcontroller::class, 'store'])->name('hotels.store');
    Route::get('/edit-hotel', [Hotelcontroller::class, 'edit'])->name('hotels.edit');
    Route::put('/update-hotel', [Hotelcontroller::class, 'update'])->name('hotels.update');
    Route::post('remove', [Hotelcontroller::class, 'remove'])->name('hotel.remove');
    Route::get('/getHotels', [Hotelcontroller::class, 'getHotels']);

    //facilities
    Route::post('store-facilities', [FacilitiesController::class, 'store'])->name('facilities.store');
    Route::get('edit-facilities', [FacilitiesController::class, 'edit'])->name('facilities.edit');
    Route::put('update-facilities', [FacilitiesController::class, 'update'])->name('facilities.update');

    //travel packages
    Route::get('/packages', [PackageController::class, 'index'])->name('packages.index');
    Route::get('/create-package', [PackageController::class, 'create'])->name('packages.create');
    Route::post('/store-package', [PackageController::class, 'store'])->name('package.store');
    Route::post('/edit-package', [PackageController::class, 'edit'])->name('package.edit');
    Route::put('/update-package', [PackageController::class, 'update'])->name('package.update');

    //package route
    Route::post('/store-packageroute', [PackageRouteController::class, 'store'])->name('packageroute.store');
    Route::post('/edit-packageroute', [PackageRouteController::class, 'edit'])->name('packageroute.edit');
    Route::post('/delete-packageroute', [PackageRouteController::class, 'destroy'])->name('packageroute.delete');

    //tourists
    Route::get('/tourists', [TouristController::class, 'index'])->name('tourists.index');
    Route::get('/create-tourist', [TouristController::class, 'create'])->name('tourists.create');
    Route::post('/store-tourist', [TouristController::class, 'store'])->name('tourists.store');
    Route::put('/update-tourist', [TouristController::class, 'update'])->name('tourists.update');
    Route::get('/getOneTourist', [TouristController::class, 'getOneTourist']);

    //tourist health
    Route::post('/store-tourist-health', [TouristHealthController::class, 'store'])->name('tourist_health.store');
    Route::put('/update-tourist-health', [TouristHealthController::class, 'update'])->name('tourist_health.update');
    Route::get('/get-tourist-health', [TouristHealthController::class, 'getTouristHealth']);

    //customers
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::post('/store-customer', [CustomerController::class, 'store'])->name('customers.store');
    Route::put('/update-customer', [CustomerController::class, 'update'])->name('customers.update');
    Route::get('/getOneCustomer', [CustomerController::class, 'getOneCustomer']);

    //tour request
    Route::get('/tour-requests', [TourRequestController::class, 'index'])->name('tour_requests.index');
    Route::post('/store-tour-request', [TourRequestController::class, 'store'])->name('tour_request.store');

});

Route::get('/template', function () {
    return view('layouts.template');
});


require __DIR__.'/auth.php';
