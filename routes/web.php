<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;



use App\Http\Controllers\CategoryController;

use App\Http\Controllers\CustomerController;

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HotelInfoController;
use App\Http\Controllers\FrontCategoryController;
use App\Http\Controllers\ResturentInfoController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\TokenVerificationMiddleware;
use App\Http\Controllers\Admin\HotelReviewController;
use App\Http\Controllers\Admin\ResturentReviewController;
use App\Http\Middleware\AdminTokenVerificationMiddleware;
use App\Http\Controllers\Admin\HotelSubcategoryController;
use App\Http\Controllers\Admin\ResturentCategoryController;


// Web API Routes
Route::post('/user-registration',[UserController::class,'UserRegistration']);
Route::post('/user-login',[UserController::class,'UserLogin']);
Route::post('/send-otp',[UserController::class,'SendOTPCode']);
Route::post('/verify-otp',[UserController::class,'VerifyOTP']);
Route::post('/reset-password',[UserController::class,'ResetPassword'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/user-profile',[UserController::class,'UserProfile'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/user-update',[UserController::class,'UpdateProfile'])->middleware([TokenVerificationMiddleware::class]);


// User Logout
Route::get('/logout',[UserController::class,'UserLogout']);

//Admin Panel === Feedback System
Route::get('/adminLogin',[AdminUserController::class,'AdminLoginPage']);
Route::post('/admin-login',[AdminUserController::class,'AdminLogin']);
Route::get('/dashboard-admin',[AdminDashboardController::class,'AdminDashboardPage'])->middleware([AdminTokenVerificationMiddleware::class]);
Route::get('/dashboard-user',[UserDashboardController::class,'UserDashboardPage']);
Route::get('/frontcategoryPage',[FrontCategoryController::class,'FrontCategoryPage']);
Route::get('/frontcategoryData',[FrontCategoryController::class,'FrontcategoryData']);
Route::get("/list-front-category",[FrontCategoryController::class,'FrontCategoryList']);
Route::post("/create-front-category",[FrontCategoryController::class,'FrontCategoryCreate']);

//HOTEL INFO

Route::get('/hotel-page',[HotelInfoController::class,'HotelFrontPage']);

Route::get('/hotelinfoPage',[HotelInfoController::class,'HotelInfoPage']);
//Route::get('/list-hotel-info',[HotelInfoController::class,'HotelInfoList']);
Route::get('/list-hotel-info',[HotelInfoController::class,'HotelInfoList']);
Route::post('/create-hotel-info',[HotelInfoController::class,'HotelInfoCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-hotel-subcategory',[HotelInfoController::class,'HotelSubCategory'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/ListHotelBySubCategory/{id}',[HotelInfoController::class,'ListHotelBySubCategory']);
Route::get('/details-hotel', [HotelInfoController::class, 'DetailsHotelInfo']);

Route::get('/HotelDetailsById/{id}', [HotelInfoController::class, 'HotelDetailsById']);


//RESTURENT SUB CATEGORY

Route::get('/resturentsubcategoryadminPage',[ResturentCategoryController::class,'ResturentSubCategoryAdminPage']);
Route::get('/list-resturent-sub-category',[ResturentCategoryController::class,'ResturentSubCategoryAdminList']);
Route::post("/create-resturent-sub-category",[ResturentCategoryController::class,'ResturentSubCategoryAdminCreate']);
Route::post("/delete-resturent-sub-category",[ResturentCategoryController::class,'ResturentSubCategoryAdminDelete']);

Route::post("/update-resturent-sub-category",[ResturentCategoryController::class,'ResturentSubCatUpdate']);
Route::post("/sub-category-resturent-by-id",[ResturentCategoryController::class,'ResturentSubCatByID']);




//RESTURENT INFO

Route::get('/resturentinfoPage',[ResturentInfoController::class,'ResturentInfoPage'])->middleware([TokenVerificationMiddleware::class]);
//Route::get('/list-hotel-info',[HotelInfoController::class,'HotelInfoList']);
Route::get('/list-resturent-info',[ResturentInfoController::class,'ResturentInfoList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/create-resturent-info',[ResturentInfoController::class,'ResturentInfoCreate'])->middleware([TokenVerificationMiddleware::class]);


Route::get('/list-resturent-cat', [ResturentInfoController::class, 'ResturentCatList'])->middleware([TokenVerificationMiddleware::class]);;

//RESTURENT REVIEW

Route::get('/resturentreviewPage',[ResturentReviewController::class,'ResturentReviewPage']);

Route::get('/list-resturent-info', [ResturentReviewController::class, 'ResturentInfoList']);


Route::get('/list-resturent-review',[ResturentReviewController::class,'ResturentReviewList']);
Route::post('/create-resturent-review',[ResturentReviewController::class,'ResturentReviewCreate']);

Route::get('/list-resturent-category',[ResturentReviewController::class,'ResturentCategory']);


//HOTEL REVIEW

Route::get('/hotelreviewPage',[HotelReviewController::class,'HotelReviewPage']);

Route::get('/list-hotel-info', [HotelReviewController::class, 'HotelInfoList']);


Route::get('/list-hotel-review',[HotelReviewController::class,'HotelReviewList']);

Route::post('/create-hotel-review',[HotelReviewController::class,'HotelReviewCreate']);

Route::get('/list-hotel-category',[HotelReviewController::class,'HotelCategory']);
Route::get('/HotelReviewsById/{id}', [HotelReviewController::class, 'HotelReviewsById']);
Route::get('/reviews/{hotel_info_id}', [HotelReviewController::class, 'getReviewsByHotel']);
Route::get('hotel-reviews/{hotel_info_id}', [HotelReviewController::class, 'showReviewsPage']);

//Hotel Sub Category
Route::get('/hotelsubcategoryadminPage',[HotelSubcategoryController::class,'HotelSubCategoryAdminPage']);
Route::get('/by-category-hotel-listy',[HotelSubcategoryController::class,'HotelListByCategoryFrontPage']);
Route::get('/list-hotel-sub-category',[HotelSubcategoryController::class,'HotelSubCategoryAdminList']);
Route::post("/create-hotel-sub-category",[HotelSubcategoryController::class,'HotelSubCategoryAdminCreate']);
Route::post("/delete-hotel-sub-category",[HotelSubcategoryController::class,'HotelSubCategoryAdminDelete']);

Route::post("/update-hotel-sub-category",[HotelSubcategoryController::class,'HotelSubCatUpdate']);
Route::post("/sub-category-hotel-by-id",[HotelSubcategoryController::class,'HotelSubCatByID']);
















// Page Routes
Route::get('/',[HomeController::class,'HomePage']);
Route::get('/userLogin',[UserController::class,'LoginPage']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
//Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/categoryPage',[CategoryController::class,'CategoryPage']);













// Category API






// Customer API





// Product API











// SUMMARY & Report
Route::get("/summary",[UserDashboardController::class,'Summary'])->middleware([TokenVerificationMiddleware::class]);




//ELEMENT




//


