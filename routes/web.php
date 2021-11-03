<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Client\HomeController;
use App\Http\Controllers\Admin\UserTourController;
use App\Http\Controllers\Admin\TransportController;
use App\Http\Controllers\Admin\TourController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\HotelController;
use App\Http\Controllers\Admin\CountriesController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\AuthController;
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

Route::prefix('admin')->group(function (){
    //booked tour
    Route::prefix('booked-tour')->group(function (){
        Route::get('index', [UserTourController::class, 'index'])->name('tour_user.index');
        Route::get('delete-booked/{id}', [UserTourController::class, 'delete'])->name('delete-booked');
        Route::get('edit-booked-tour/{id}', [UserTourController::class, 'formEdit'])->name('edit-booked-tour');
        Route::post('edit-booked-tour/{id}', [UserTourController::class, 'postEdit']);
        Route::post('book-tour', [UserTourController::class, 'bookTour'])->name('tour_user.add');
    });
    //transports
    Route::prefix('transports')->group(function (){
        Route::get('index', [TransportController::class, 'index'])->name('transport.index');
        Route::get('delete-transport/{id}', [TransportController::class, 'delete'])->name('delete-transport');
        Route::get('edit-transport/{id}', [TransportController::class, 'formEdit'])->name('edit-transport');
        Route::post('edit-transport/{id}', [TransportController::class, 'postEdit']);
        Route::post('add-transport', [TransportController::class, 'add'])->name('transport.add');
    });
    //tour
    Route::prefix('tour')->group(function (){
        Route::get('index', [TourController::class, 'index'])->name('tour.index');
        Route::get('delete/{id}', [TourController::class, 'delete'])->name('tour.delete');
        Route::post('add', [TourController::class, 'add'])->name('tour.add');
        Route::get('edit/{id}', [TourController::class, 'viewEdit'])->name('tour.edit');
        Route::post('edit/{id}', [TourController::class, 'postEdit'])->name('tour.postEdit');
        Route::get('detail_description', [TourController::class, 'viewDetail'])->name('tour.detailDescription');
    });
    //users
    Route::prefix('users')->group(function (){
        Route::get('index',[UserController::class, 'index'])->name('user.index');
        Route::post('add',[UserController::class, 'add'])->name('user.add');
        Route::get('delete/{id}',[UserController::class, 'delete'])->name('user.delete');
        Route::get('edit/{id}',[UserController::class, 'viewEdit'])->name('user.edit');
        Route::post('edit/{id}',[UserController::class, 'postEdit']);
    });
    //hotel
    Route::prefix('hotels')->group(function (){
        Route::get('index', [HotelController::class, 'index'])->name('hotel.index');
        Route::get('delete/{id}', [HotelController::class, 'delete'])->name('hotel.delete');
        Route::get('edit-hotel/{id}', [HotelController::class, 'formEdit'])->name('hotel.edit');
        Route::post('edit-hotel/{id}', [HotelController::class, 'postEdit']);
        Route::post('add', [HotelController::class, 'add'])->name('hotel.add');
    });
    //country
    Route::prefix('countries')->group(function (){
        Route::get('index', [CountriesController::class, 'index'])->name('countries.index');
        Route::get('delete/{id}', [CountriesController::class, 'delete'])->name('countries.delete');
        Route::get('edit-countries/{id}', [CountriesController::class, 'formEdit'])->name('countries.edit');
        Route::post('edit-countries/{id}', [CountriesController::class, 'postEdit']);
        Route::post('add', [CountriesController::class, 'add'])->name('countries.add');
    });
    //news
    Route::prefix('news')->group(function (){
        Route::get('index', [NewsController::class, 'index'])->name('news.index');
        Route::get('delete/{id}', [NewsController::class, 'delete'])->name('news.delete');
        Route::get('edit-news/{id}', [NewsController::class, 'formEdit'])->name('news.edit');
        Route::post('edit-news/{id}', [NewsController::class, 'postEdit']);
        Route::post('add', [NewsController::class, 'add'])->name('news.add');
        Route::get('detail_description', [NewsController::class, 'viewDetail'])->name('news.detailDescription');
    });
});

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('tour', [HomeController::class, 'tour'])->name('tour');
Route::get('tour-detail/{id}', [HomeController::class, 'tourDetail'])->name('tour_detail');
Route::get('blog', [HomeController::class, 'blog'])->name('blog');
Route::get('blog-detail/{id}', [HomeController::class, 'blogDetail'])->name('blog.detail');
Route::post('submitTour', [HomeController::class, 'submitTour'])->name('submitTour');
Route::post('booking-tour/{id}', [HomeController::class, 'bookingTour'])->name('add_booking_tour');
Route::get('booking-tour-user', [HomeController::class, 'bookingTourUser'])->name('booking_tour_user');
Route::get('confirm_tour/{id}', [HomeController::class, 'confirmTour'])->name('confirm_tour');
Route::post('filter_tour', [HomeController::class, 'tour'])->name('filter_tour');
Route::post('filter_news', [HomeController::class, 'blog'])->name('find_news');
Route::post('find_key', [HomeController::class, 'findKey'])->name('find_key');
Route::get('contact', function (){
   return view('client.contact.main');
})->name('contact');


Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('register', [AuthController::class, 'register'])->name('register');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');


