<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Home;
use App\Http\Controllers\Howitworks;
use App\Http\Controllers\Services;
use App\Http\Controllers\Faq;
use App\Http\Controllers\Pricing;
use App\Http\Controllers\Register;
use App\Http\Controllers\Terms;
use App\Http\Controllers\Customerportal;
use App\Http\Controllers\Admin\Dashboard;
use App\Http\Controllers\Admin\Profile;
use App\Http\Controllers\Admin\Documents;
use App\Http\Controllers\Admin\Applications;
use App\Http\Controllers\Admin\Package;
use App\Http\Controllers\Admin\Admin;
use App\Http\Controllers\Admin\Notifications;

use App\Http\Controllers\ApplicationTracking;


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
Route::get('/forgotpassword',[Register::class, 'forgotpassword']);
Route::post('/forgotpassword',[Register::class, 'forgotpassword']);

Route::get('/resetpassword',[Register::class, 'resetpassword']);
Route::post('/resetpassword',[Register::class, 'resetpassword']);


Route::get('/termsofservice',[Terms::class, 'termsofservice']);
Route::get('/privacypolicy',[Terms::class, 'privacypolicy']);

Route::get('/track-your-application',[ApplicationTracking::class, 'index']);
Route::post('/processTracking',[ApplicationTracking::class, 'processTracking']);


Route::prefix('admin')->name('admin.')->group(function () {    
    Route::get('/dashboard',[Dashboard::class, 'dashboard']);
    Route::get('/myprofile',[Profile::class, 'myprofile']);
    Route::post('/saveprofile',[Profile::class, 'saveprofile']);
    Route::post('/saveprofilephoto',[Profile::class, 'saveprofilephoto']);
    Route::get('/uploaddocument',[Documents::class, 'uploaddocument']);
    
    Route::get('/myapplicants',[Applications::class, 'myApplicants']);
    Route::post('/generateotp',[Applications::class, 'generateotp']);
    Route::get('/myapplications',[Applications::class, 'myApplications']);
    Route::get('/application/{Id}',[Applications::class, 'application']);
    Route::post('/updateApplicationStatus',[Applications::class, 'updateApplicationStatus']);


    Route::post('/getApplicantData',[Applications::class, 'getApplicantData']);
    Route::post('/getApplicantProfile',[Applications::class, 'getApplicantProfile']);
    //Route::post('/deleteApplicant',[Applications::class, 'deleteApplicant']);

    Route::get('/notifications',[Notifications::class, 'notifications']);

    Route::get('/mypackage',[Package::class, 'plans']);
    Route::get('/buy/{package}',[Package::class, 'buy']);

    Route::get('/payment/callback',[Package::class, 'payment']);
    Route::get('/payment/cancel',[Package::class, 'cancel']);
    Route::post('/savequote',[Package::class, 'savequote']);

    Route::get('/signout',[Admin::class, 'signout']);
   
    
    Route::get('/sysadmlogin',[Admin::class, 'login']);
    Route::post('/sysadmlogin',[Admin::class, 'loginprocess']);
    Route::get('/admin-dashboard',[Admin::class, 'dashboard']);
    Route::get('/admin-customers',[Admin::class, 'customers']);
    Route::get('/admin-customer/{id}',[Admin::class, 'customer']);
    
    Route::get('/admin-customer-applicants/{id}',[Admin::class, 'customerApplicants']);

    Route::post('/admin-customer-applicant',[Admin::class, 'customerApplicant']);
    
    /*Route::get('admin/customer-applicant/{id}/applications',[Admin::class, 'customerApplications']);*/

    Route::get('/admin-customer-applications/{id}',[Admin::class, 'customerApplications']);
    Route::post('/deleteApplication',[Admin::class, 'deleteApplication']);
    
    Route::post('/admin-updatepackage',[Admin::class, 'updatepackage']);
    Route::get('/admin-settings',[Admin::class, 'settings']);
    Route::post('/savepaymentsettings',[Admin::class, 'savepaymentsettings']);
    Route::post('/saveemailsettings',[Admin::class, 'saveemailsettings']);
    Route::get('/admin-myprofile',[Admin::class, 'myprofile']);
    Route::post('/updatemyprofile',[Admin::class, 'updatemyprofile']);
    Route::post('/updatepassword',[Admin::class, 'updatepassword']);

    Route::post('/sendDocumentRequest',[Notifications::class, 'sendDocumentRequest']);
    Route::post('/addNewApplicant',[Notifications::class, 'addNewApplicant']);
    
    Route::post('/sendTestEmail', [Admin::class, 'sendTestEmail']);
    Route::post('/generateaccesskey', [Admin::class, 'generateaccesskey']);
    
});

Route::prefix('portal')->name('portal.')->group(function () {
    //Customerportal
    Route::get('/login/{portalId}',[Customerportal::class, 'index']);
    Route::post('/checkemail',[Customerportal::class, 'checkEmail']);
    Route::post('/sendotp',[Customerportal::class, 'sendloginotp']);
    Route::get('/login',[Customerportal::class, 'login']);
    Route::post('/login',[Customerportal::class, 'login']);
    Route::get('/myprofile',[Customerportal::class, 'myprofile']);
    Route::post('/saveprofile',[Customerportal::class, 'saveprofile']);
    Route::get('/dashboard',[Customerportal::class, 'dashboard']);
    Route::get('/myapplications',[Customerportal::class, 'myapplications']);
    Route::get('/application/{Id}',[Customerportal::class, 'application']);
    Route::get('/newapplication',[Customerportal::class, 'newapplication']);
    Route::post('/submitapplication',[Customerportal::class, 'submitapplication']);
    Route::get('/notifications',[Customerportal::class, 'notifications']);
    
    Route::get('/documentrequests',[Customerportal::class, 'documentrequests']);
    Route::get('/documentrequest/{Id}',[Customerportal::class, 'documentrequest']);
    Route::post('/submitapplicationrequest',[Customerportal::class, 'submitapplicationrequest']);
    
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