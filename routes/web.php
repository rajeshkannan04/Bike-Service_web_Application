<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\shopOwnerController;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/', function () {
    return view('user');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/customer/{userType}', [RegisterController::class, 'index']);
Route::get('/shopOwner/{userType}', [RegisterController::class, 'index']);
Route::get('/signin/{userType}', [RegisterController::class, 'index']);
Route::get('/signup/{userType}', [RegisterController::class, 'signup']);
Route::post('/register', [RegisterController::class, 'store']);
Route::post('/loginc/{userType}', [RegisterController::class, 'loginCustomer']);
Route::post('/logins/{userType}', [RegisterController::class, 'loginShopowner']);
Route::get('/newUser/{id}', [RegisterController::class, 'show'])->name('newUser');

    // CUSTOMER

Route::get('/bookService/{id}', [CustomerController::class, 'show']);
Route::post('/order', [CustomerController::class, 'order']);
Route::get('/booked/{id}', [CustomerController::class, 'index'])->name('booked');
Route::get('/historyCustomer/{id}', [CustomerController::class, 'history'])->name('historyCustomer');    
Route::get('/cancleCus/{id}', [CustomerController::class, 'cancleBook']);
Route::get('/customerHome/{id}', [CustomerController::class, 'home']);
Route::get('/CustomerAbout/{id}', [CustomerController::class, 'about']);
Route::get('/CustomerContact/{id}', [CustomerController::class, 'contact']);

    // SHOP Owner

Route::post('/logout', [shopOwnerController::class, 'logout'])->name('logout'); //  logout
Route::get('/addShop/{id}', [shopOwnerController::class, 'register']);          //  shopOwner
Route::get('/editShop/{id}', [shopOwnerController::class, 'edit']);           //  edit shopOwner
Route::post('/shopregister/{id}', [shopOwnerController::class, 'create']);       //  shopOwner
Route::get('/BickService/{id}', [shopOwnerController::class, 'index'])->name('BickSer');
Route::get('/changeimg/{id}', [shopOwnerController::class, 'image']);           //  owner-img
Route::get('/historySO/{id}', [shopOwnerController::class, 'history'])->name('historySO');
Route::get('/bookingStatus/{data}/{id}', [shopOwnerController::class, 'bookingStatus']);
Route::get('/shopOwnerHome/{id}', [shopOwnerController::class, 'home']);
Route::get('/shopOwnerAbout/{id}', [shopOwnerController::class, 'about']);
Route::get('/shopOwnerContact/{id}', [shopOwnerController::class, 'contact']);



Route::post('/uploadImage/{id}', [shopOwnerController::class, 'image']);          //  upload-img
Route::get('/getImage/{id}', [shopOwnerController::class, 'getImage'])->name('getImage');          //  get-img
Route::get('/confirm', [shopOwnerController::class, 'confirm']);                  //  owner-img
