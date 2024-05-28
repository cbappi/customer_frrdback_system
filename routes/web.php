<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SheetController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\FabricsController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CostingsController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ElementsController;
use App\Http\Controllers\LearnersController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FrontCategoryController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Middleware\TokenVerificationMiddleware;
use App\Http\Middleware\AdminTokenVerificationMiddleware;


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

//Admin Panel
Route::get('/adminLogin',[AdminUserController::class,'AdminLoginPage']);
Route::post('/admin-login',[AdminUserController::class,'AdminLogin']);
Route::get('/dashboard-admin',[AdminDashboardController::class,'AdminDashboardPage'])->middleware([AdminTokenVerificationMiddleware::class]);
Route::get('/frontcategoryPage',[FrontCategoryController::class,'FrontCategoryPage']);
Route::get("/list-front-category",[FrontCategoryController::class,'FrontCategoryList']);


// Page Routes
Route::get('/',[HomeController::class,'HomePage']);
Route::get('/userLogin',[UserController::class,'LoginPage']);
Route::get('/userRegistration',[UserController::class,'RegistrationPage']);
Route::get('/sendOtp',[UserController::class,'SendOtpPage']);
Route::get('/verifyOtp',[UserController::class,'VerifyOTPPage']);
Route::get('/resetPassword',[UserController::class,'ResetPasswordPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/dashboard',[DashboardController::class,'DashboardPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/userProfile',[UserController::class,'ProfilePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/categoryPage',[CategoryController::class,'CategoryPage']);
Route::get('/customerPage',[CustomerController::class,'CustomerPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/productPage',[ProductController::class,'ProductPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/invoicePage',[InvoiceController::class,'InvoicePage'])->middleware([TokenVerificationMiddleware::class]);


Route::get('/sheetPage',[SheetController::class,'SheetPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/salePageSheet',[SheetController::class,'SalePage'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/salePage',[InvoiceController::class,'SalePage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/reportPage',[ReportController::class,'ReportPage'])->middleware([TokenVerificationMiddleware::class]);

Route::get('/costPage',[CostingsController::class,'CostPage'])->middleware([TokenVerificationMiddleware::class]);






// Category API
Route::post("/create-category",[CategoryController::class,'CategoryCreate']);
Route::get("/list-category",[CategoryController::class,'CategoryList']);
Route::post("/delete-category",[CategoryController::class,'CategoryDelete']);
Route::post("/update-category",[CategoryController::class,'CategoryUpdate']);
Route::post("/category-by-id",[CategoryController::class,'CategoryByID']);


// Customer API
Route::post("/create-customer",[CustomerController::class,'CustomerCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-customer",[CustomerController::class,'CustomerList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-customer",[CustomerController::class,'CustomerDelete'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-customer",[CustomerController::class,'CustomerUpdate'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/customer-by-id",[CustomerController::class,'CustomerByID'])->middleware([TokenVerificationMiddleware::class]);


// Product API
Route::post("/create-product",[ProductController::class,'CreateProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/delete-product",[ProductController::class,'DeleteProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/update-product",[ProductController::class,'UpdateProduct'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/list-product",[ProductController::class,'ProductList'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/product-by-id",[ProductController::class,'ProductByID'])->middleware([TokenVerificationMiddleware::class]);



// Invoice
Route::post("/invoice-create",[InvoiceController::class,'invoiceCreate'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/invoice-select",[InvoiceController::class,'invoiceSelect'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/invoice-details",[InvoiceController::class,'InvoiceDetails'])->middleware([TokenVerificationMiddleware::class]);
Route::post("/invoice-delete",[InvoiceController::class,'invoiceDelete'])->middleware([TokenVerificationMiddleware::class]);

//SHEET

Route::post("/sheet-create",[SheetController::class,'sheetCreate'])->middleware([TokenVerificationMiddleware::class]);



// SUMMARY & Report
Route::get("/summary",[DashboardController::class,'Summary'])->middleware([TokenVerificationMiddleware::class]);
Route::get("/sales-report/{FormDate}/{ToDate}",[ReportController::class,'SalesReport'])->middleware([TokenVerificationMiddleware::class]);


//LEARNER
Route::get('/learnerPage',[LearnersController::class,'LearnerPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-learner',[LearnersController::class,'LearnerList'])->middleware([TokenVerificationMiddleware::class]);

//ELEMENT

Route::get('/elementPage',[ElementsController::class,'ElementPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-element',[ElementsController::class,'ElementList'])->middleware([TokenVerificationMiddleware::class]);
Route::post('/create-element',[ElementsController::class,'ElementCreate'])->middleware([TokenVerificationMiddleware::class]);


//FABRIC
Route::get('/fabricPage',[FabricsController::class,'FabricPage'])->middleware([TokenVerificationMiddleware::class]);
Route::get('/list-fabric',[FabricsController::class,'FabricList'])->middleware([TokenVerificationMiddleware::class]);
([TokenVerificationMiddleware::class]);
Route::post('/create-fabric',[FabricsController::class,'FabricCreate'])->middleware([TokenVerificationMiddleware::class]);

//


