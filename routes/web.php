<?php

use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\PackageController as AdminPackageController;
use App\Http\Controllers\Admin\RemedyController;
use App\Http\Controllers\Admin\FirstLetterAttributeController;
use App\Http\Controllers\Admin\yogasPredictionController;
use App\Http\Controllers\Admin\UserController as AdminUserController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\NumerologyController;
use App\Http\Controllers\User\NumerologyMobileController;
use App\Http\Controllers\User\OrderController as UserOrderController;
use App\Http\Controllers\User\NumappController;
use App\Http\Controllers\User\PdfController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MdYogaPredictionController;
use App\Http\Controllers\Admin\AdYogaPredictionController;
use App\Http\Controllers\Admin\PdYogaPredictionController;

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

// Home routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact', [HomeController::class, 'processContact'])->name('contact.process');

// Authentication routes
Route::post('/check-email', [LoginController::class, 'checkEmail'])->name('check.email');
Route::post('/send-otp', [LoginController::class, 'sendOTP'])->name('send.otp');
Route::get('/set-device-id', [LoginController::class, 'setDeviceId'])->name('contractor.devicesid');


Route::middleware('guest')->group(function () {
    Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [RegisterController::class, 'register']);
    Route::get('/forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');
});

Route::post('/logout', [LoginController::class, 'logout'])->name('logout')->middleware('auth');

// Test route
Route::get('/test', function () {
    return view('test');
});

// Admin routes
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Package management
    Route::resource('packages', AdminPackageController::class);
    Route::get('users/release/{any}', [AdminPackageController::class, 'releaseUser'])->name('users.release');
    // User management
    Route::resource('users', AdminUserController::class);

    // Order management
    Route::resource('orders', AdminOrderController::class);

    // Attributes management
    Route::resource('attributes', AttributeController::class);

    // Remedies management
    Route::resource('remedies', RemedyController::class);

    // First Letter Attributes management
    Route::resource('first-letter-attributes', FirstLetterAttributeController::class);

    Route::resource('yoga-prediction', yogasPredictionController::class);
    Route::resource('md-yoga-prediction', MdYogaPredictionController::class);
    Route::resource('ad-yoga-prediction', AdYogaPredictionController::class);
    Route::resource('pd-yoga-prediction', PdYogaPredictionController::class);

});

// User routes
Route::middleware('auth')->prefix('user')->name('user.')->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');

    // Order management
    Route::get('/orders', [UserOrderController::class, 'index'])->name('orders.index');
    Route::get('/orders/{order}', [UserOrderController::class, 'show'])->name('orders.show');
    Route::get('/packages/{package}/order', [UserOrderController::class, 'create'])->name('orders.create');
    Route::post('/packages/{package}/order', [UserOrderController::class, 'store'])->name('orders.store');

    // Numerology routes
    Route::get('/numerology/name', [NumerologyController::class, 'nameNumerology'])->name('numerology.name');
    Route::post('/numerology/name', [NumerologyController::class, 'calculateNameNumerology'])->name('numerology.name.calculate');
    Route::get('/numerology/name/pdf/{id}', [NumerologyController::class, 'generateNamePdf'])->name('numerology.name.pdf');
    Route::get('/numerology/mobile', [NumerologyController::class, 'mobileNumerology'])->name('numerology.mobile');
    Route::post('/numerology/mobile', [NumerologyMobileController::class, 'calculateMobileNumerology'])->name('numerology.mobile.calculate');
    Route::get('/numerology/birth', [NumerologyController::class, 'birthNumerology'])->name('numerology.birth');
    Route::post('/numerology/birth', [NumerologyController::class, 'calculateBirthNumerology'])->name('numerology.birth.calculate');
    Route::get('/numerology/numapp', [NumappController::class, 'numapp'])->name('numerology.numapp');
    Route::post('/numerology/numapp', [NumappController::class, 'calculateNumapp'])->name('numerology.numapp.calculate');
    // Route::get('/generate-pdf/{any}', [PdfController::class, 'generatePDF'])->name('generate.pdf');
    Route::post('/generate-pdf', [PdfController::class, 'generatePDF'])->name('generate.pdf');
    Route::get('/numerology/name/pdf', [NumerologyController::class, 'downloadPdf'])->name('numerology.download.pdf');


    });
