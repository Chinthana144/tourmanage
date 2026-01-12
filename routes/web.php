<?php

use App\Http\Controllers\ActivityController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\FacilitiesController;
use App\Http\Controllers\Hotelcontroller;
use App\Http\Controllers\HotelPriceController;
use App\Http\Controllers\HotelRoomController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\PackageController;
use App\Http\Controllers\PackageRouteController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourHotelController;
use App\Http\Controllers\TouristController;
use App\Http\Controllers\TouristHealthController;
use App\Http\Controllers\TourPackageItemController;
use App\Http\Controllers\TourRequestController;
use App\Http\Controllers\TourRequestLocationController;
use App\Http\Controllers\TourRequestPeopleController;
use App\Http\Controllers\TourRequestRoomController;
use App\Http\Controllers\TourRoomController;
use App\Http\Controllers\TourRouteController;
use App\Http\Controllers\TourRouteItemController;
use App\Http\Controllers\TravelMediaController;
use App\Http\Controllers\UserController;
use App\Models\TouristHealth;
use App\Models\TourRequestRooms;
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

    //main page -> move this to open after development
    Route::get('/main', [MainController::class, 'index'])->name('main.index'); 

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
    Route::get('/getBoardingTypes', [Hotelcontroller::class, 'getBoardingTypes']);

    //facilities
    Route::post('/store-facilities', [FacilitiesController::class, 'store'])->name('facilities.store');
    Route::get('/edit-facilities', [FacilitiesController::class, 'edit'])->name('facilities.edit');
    Route::put('/update-facilities', [FacilitiesController::class, 'update'])->name('facilities.update');
    Route::get('/getHotelFacilities', [FacilitiesController::class, 'getHotelFacilities']);

    //hotel rooms
    Route::get('/hotel-rooms', [HotelRoomController::class, 'index'])->name('hotelrooms.index');
    Route::post('/store-hotel-room', [HotelRoomController::class, 'store'])->name('hotelrooms.store');
    Route::put('/update-hotel-room', [HotelRoomController::class, 'update'])->name('hotelrooms.update');
    Route::post('/destroy-hotel-room', [HotelRoomController::class, 'destroy'])->name('hotelrooms.destroy');
    Route::get('/getOneRoom', [HotelRoomController::class, 'getOneRoom']);

    //hotel prices
    Route::get('/hotel-prices', [HotelPriceController::class, 'index'])->name('hotelprices.index');
    Route::post('/store-hotel-price', [HotelPriceController::class, 'store'])->name('hotelprices.store');
    Route::get('/getOneHotelPrice', [HotelPriceController::class, 'getOneHotelPrice']);

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
    Route::get('/create-tour-requests', [TourRequestController::class, 'create'])->name('tour_requests.create');
    Route::post('/store-tour-request', [TourRequestController::class, 'store'])->name('tour_request.store');
    Route::put('/update-tour-request', [TourRequestController::class, 'update'])->name('tour_request.update');
    Route::delete('/delete-tour-request', [TourRequestController::class, 'destroy'])->name('tour_request.destroy');
    Route::get('/getOneRequest', [TourRequestController::class, 'getOneRequest']);

    //tour request people
    Route::get('/tour-request-people', [TourRequestPeopleController::class, 'index'])->name('tour_request_people.index');
    Route::post('/storeRequestPeople', [TourRequestPeopleController::class, 'storeRequestPeople']);
    Route::get('/getAllRequestPeople', [TourRequestPeopleController::class, 'getAllRequestPeople']);
    Route::get('/getOneRequestPeople', [TourRequestPeopleController::class, 'getOneRequestPeople']);
    Route::post('/removeRequestPeople', [TourRequestPeopleController::class, 'removeRequestPeople']);

    //tour request location
    Route::get('/tour-request-location', [TourRequestLocationController::class, 'index'])->name('tour_request_location.index');
    Route::post('store-tour-request-location', [TourRequestLocationController::class, 'store'])->name('tour_request_location.store');
    Route::post('/storeTourRequestLocation', [TourRequestLocationController::class, 'storeTourRequestLocation']);
    Route::get('/getRequestLocations', [TourRequestLocationController::class, 'getRequestLocations']);

    //travel media
    Route::get('/travel-media', [TravelMediaController::class, 'index'])->name('travel_media.index');
    Route::post('/store-travel-media', [TravelMediaController::class, 'store'])->name('travel_media.store');
    Route::put('/update-travel-media', [TravelMediaController::class, 'update'])->name('travel_media.update');
    Route::get('/getOneTravelMedia', [TravelMediaController::class, 'getOneTravelMedia']);
    Route::get('/getTravelMedia', [TravelMediaController::class, 'getTravelMedia']);

    //restaurants
    Route::get('/restaurants', [RestaurantController::class, 'index'])->name('restaurants.index');
    Route::get('/create-restaurants', [RestaurantController::class, 'create'])->name('restaurants.create');
    Route::post('/store-restaurants', [RestaurantController::class, 'store'])->name('restaurants.store');
    Route::post('/edit-restaurants', [RestaurantController::class, 'edit'])->name('restaurants.edit');
    Route::put('/update-restaurant', [RestaurantController::class, 'update'])->name('restaurants.update');
    Route::get('/getRestaurants', [RestaurantController::class, 'getRestaurants']);
    Route::get('/getOneRestaurant', [RestaurantController::class, 'getOneRestaurant']);
    Route::get('/getMealTypes', [RestaurantController::class, 'getMealTypes']);

    //activities
    Route::get('/activities', [ActivityController::class, 'index'])->name('activities.index');
    Route::post('/store-activities', [ActivityController::class, 'store'])->name('activities.store');
    Route::put('/update-activities', [ActivityController::class, 'update'])->name('activities.update');
    Route::get('/getOneActivity', [ActivityController::class, 'getOneActivity']);
    Route::get('/getActivitybyLocation', [ActivityController::class, 'getActivitybyLocation']);
    Route::get('/getActivities', [ActivityController::class, 'getActivities']);
    
    //tours
    Route::get('/tours', [TourController::class, 'index'])->name('tours.index');
    Route::post('/store-tours', [TourController::class, 'store'])->name('tours.store');
    Route::put('/update-tours', [TourController::class, 'update'])->name('tours.update');
    Route::get('/getOneTour', [TourController::class, 'getOneTour']);

    //tour route
    Route::get('/tour-routes', [TourRouteController::class, 'index'])->name('tour_route.index');
    // Route::post('/activityStore', [TourRouteController::class, 'activityStore'])->name('tour_route.activity_store');
    // Route::post('/locationStore', [TourRouteController::class, 'locationStore'])->name('tour_route.location_store');
    // Route::post('/hotelStore', [TourRouteController::class, 'hotelStore'])->name('tour_route.hotel_store');
    // Route::post('/restaurantStore', [TourRouteController::class, 'restaurantStore'])->name('tour_route.restaurant_store');
    // Route::post('/travelStore', [TourRouteController::class, 'travelStore'])->name('tour_route.travel_store');
    Route::delete('/route-destroy', [TourRouteController::class, 'destroy'])->name('tour_route.destroy');
    Route::post('/route-orderUp', [TourRouteController::class, 'orderUp'])->name('tour_route.order_up');
    Route::post('/route-orderDown', [TourRouteController::class, 'orderDown'])->name('tour_route.order_down');
    Route::get('/getOneTourRoute', [TourRouteController::class, 'getOneTourRoute']);

    //tour route items
    Route::get('/tour-route-items', [TourRouteItemController::class, 'index'])->name('tour_route_items.index');
    Route::post('/locationStore', [TourRouteItemController::class, 'locationStore'])->name('route_items.location_store');
    Route::post('/hotelStore', [TourRouteItemController::class, 'hotelStore'])->name('route_items.hotel_store');
    Route::post('/restaurantStore', [TourRouteItemController::class, 'restaurantStore'])->name('route_items.restaurant_store');
    Route::post('/activityStore', [TourRouteItemController::class, 'activityStore'])->name('route_items.activity_store');
    Route::post('/travelStore', [TourRouteItemController::class, 'travelStore'])->name('route_items.travel_store');

    //tour package items
    Route::get('/tour-package-items', [TourPackageItemController::class, 'index'])->name('tour_package_items.index');
    Route::post('/store-tour-package-item', [TourPackageItemController::class, 'store'])->name('tour_package_items.store');
    Route::post('/deleteRouteItem', [TourRouteItemController::class, 'deleteRouteItem']);
    Route::get('/routeMoveUp', [TourRouteItemController::class, 'routeMoveUp']);
    Route::get('/routeMoveDown', [TourRouteItemController::class, 'routeMoveDown']);
    Route::get('/getRouteItemsByTourID', [TourRouteItemController::class, 'getRouteItemsByTourID']);

    //tour hotels
    Route::post('/store-tour-hotel', [TourHotelController::class, 'store'])->name('tour_hotel.store');
    Route::post('/update-tour-hotel', [TourHotelController::class, 'update'])->name('tour_hotel.update');

    //tour rooms
    Route::post('/store-tour-room', [TourRoomController::class, 'store'])->name('tour_request_room.store');
    Route::delete('/destroy-tour-room', [TourRoomController::class, 'destroy'])->name('tour_request_room.destroy');

    //quotations
    Route::get('/quotations', [QuotationController::class, 'index'])->name('quotation.index');
    Route::post('/generatePdf', [QuotationController::class, 'generatePdf'])->name('quotation.generate');
});

// Route::get('/template', function () {
//     return view('layouts.template');
// });

require __DIR__.'/auth.php';
