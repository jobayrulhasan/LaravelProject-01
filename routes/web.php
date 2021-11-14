<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Routing\Route as RoutingRoute;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/redirects', [HomeController::class, 'redirects']);
//user
Route::get('/users', [AdminController::class, 'user']);
Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);  //delete user
Route::get('/deletemenu/{id}', [AdminController::class, 'deletemenu']); //delete foodmenu
Route::get('/editmenu/{id}', [AdminController::class, 'editmenu']); //edit food menu view
Route::post('/edit/{id}', [AdminController::class, 'edit']); //edit food menu
Route::get('/Foodmenu', [AdminController::class, 'Foodmenu']); //food menu
Route::post('/uploadfood', [AdminController::class, 'uploadfood']);

//for reservation
Route::post('/reservation', [AdminController::class, 'reservation']);
Route::get('/viewreservation', [AdminController::class, 'viewreservation']); // to view reservation data
Route::get('/reservationDelete/{id}', [AdminController::class, 'reservationDelete']); //delete reservation records

//for food chef
Route::get('/viewchef', [AdminController::class, 'viewchef']);
Route::post('/uploadchef', [AdminController::class, 'uploadchef']); //upload chef information with photo
Route::get('/editChef/{id}', [AdminController::class, 'editChef']);
Route::post('/updatechef/{id}', [AdminController::class, 'updatechef']); //to update data
Route::get('/deleteChef/{id}', [AdminController::class, 'deleteChef']); //to delete a chef from the list

//Add cart section
Route::post('/addcart/{id}', [HomeController::class, 'addcart']);
Route::get('/showcart/{id}', [HomeController::class, 'showcart']);
Route::get('/remove/{id}', [HomeController::class, 'remove']);


//order confirm
Route::post('/orderconfirm', [HomeController::class, 'orderconfirm']);
Route::get('/orders', [AdminController::class, 'orders']);
Route::get('/search', [AdminController::class, 'search']); //for search

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
