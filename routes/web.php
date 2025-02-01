<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Home;
use App\Http\Controllers\Howitworks;
use App\Http\Controllers\Services;
use App\Http\Controllers\Faq;
use App\Http\Controllers\Pricing;
use App\Http\Controllers\Register;
use App\Http\Controllers\Customerportal;
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
    Route::post('/saveprofilephoto',[Profile::class, 'saveprofilephoto']);
    
    Route::get('/uploaddocument',[Documents::class, 'uploaddocument']);
    
});

Route::prefix('portal')->name('portal.')->group(function () {
    //Customerportal
    Route::get('/login/{portalId}',[Customerportal::class, 'index']);
    Route::post('/checkemail',[Customerportal::class, 'checkEmail']);
    Route::post('/sendotp',[Customerportal::class, 'sendloginotp']);
    Route::post('/login',[Customerportal::class, 'login']);
    Route::get('/myprofile',[Customerportal::class, 'myprofile']);
    Route::post('/saveprofile',[Customerportal::class, 'saveprofile']);
    Route::get('/dashboard',[Customerportal::class, 'dashboard']);
    Route::get('/newapplication',[Customerportal::class, 'newapplication']);
    Route::post('/submitapplication',[Customerportal::class, 'submitapplication']);
    Route::get('/logout',[Customerportal::class, 'logout']);
    
});

Route::get('/image/{adminId}/{filename}', function ($adminId, $filename) {
    // Build the path to the image
    $path = storage_path('app/users/' . $adminId . '/assets/images/' . $filename);
    
    // Check if the file exists
    if (file_exists($path)) {
        // Return the image as a response
        return response()->file($path);
    }
    
    // If the file doesn't exist, return a 404 response
    abort(404, 'Image not found.');
})->name('image.display');