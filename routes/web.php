<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Home;
use App\Http\Controllers\Howitworks;
use App\Http\Controllers\Services;
use App\Http\Controllers\Faq;
use App\Http\Controllers\Pricing;
use App\Http\Controllers\Register;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Profile;
use App\Http\Controllers\Admin\Documents;


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
/*
Route::get('/larvelwelcome', function () {
    return view('welcome');
});
*/

Route::get('/',[Home::class, 'homepage']);
Route::get('/about-us',[Home::class, 'homepage']);
Route::get('/how-it-works',[Howitworks::class, 'howitworks']);
Route::get('/services',[Services::class, 'services']);
Route::get('/faq',[Faq::class, 'faq']);
Route::get('/pricing',[Pricing::class, 'pricing']);
Route::get('/login',[Register::class, 'login']);
Route::post('/login',[Register::class, 'login']);
Route::get('/register',[Register::class, 'register']);
Route::post('/register',[Register::class, 'register']);


Route::prefix('admin')->name('admin.')->group(function () {    
    Route::get('/dashboard',[Dashboard::class, 'dashboard']);
    Route::get('/myprofile',[Profile::class, 'myprofile']);
    Route::post('/saveprofile',[Profile::class, 'saveprofile']);
    Route::get('/uploaddocument',[Documents::class, 'uploaddocument']);
    
});
