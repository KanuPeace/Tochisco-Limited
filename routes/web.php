<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TodosController;
// use App\Http\Controllers\Users\CategoryController;
// use App\Http\Controllers\Admin\CategoriesController;


// use App\Http\Controllers\Users\PostController;
// use App\Http\Controllers\Users\DashboardController;

// use App\Http\Controllers\Admin\AdminPostController;
// use App\Http\Controllers\Admin\DashboardController;
// use App\Http\Controllers\Users\ProfileController;
use App\Http\Controllers\Web\WelcomeController;
use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\IndexController;
use App\Http\Controllers\Web\PropertiesController;
use App\Http\Controllers\Users\DashboardController;



use App\Models\Todo;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

// Route::get('/', function () {
//     return view("web.welcome");
// });

// Route::get('/', [App\Http\Controllers\Web\WelcomeController::class, 'index'])->name('/home');
Route::get('/search', [App\Http\Controllers\WelcomeController::class, 'search'])->name('web.search');
Route::get('/category/{categories}/post', [App\Http\Controllers\WelcomeController::class, 'list'])->name('category.post');
// Route::get('/home', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');

Route::get('/welcome', [App\Http\Controllers\HomeController::class, 'index'])->name('welcome');

Auth::routes(["verify" => true]);


Route::as("user.")->namespace("Users")->middleware('verified')->group(function () {
    // Route::resource('user', DashboardsController::class);
    Route::get('/dashboard', "DashboardController@dashboard")->name("dashboard");
    Route::get('/', "DashboardController@show")->name("show");
    Route::get('/', "DashboardController@list")->name("list");
    Route::get('/', "DashboardController@specificCategory")->name("specificCategory");
    Route::get('/referrals', "DashboardController@referrals")->name("referrals");
    Route::get('/transactions', "DashboardController@transactions")->name("transactions");
    Route::get('/subscriptions', "DashboardController@subscriptions")->name("subscriptions");
    Route::get('/withdrawal-requests', "DashboardController@withdrawal_requests")->name("withdrawal_requests");
    Route::put('/update', "ProfileController@update")->name("update");
    Route::get('/edit-profile', "ProfileController@edit_profile")->name("edit_profile");
    Route::get('/earnings', [App\Http\Controllers\Dashboard\EarningsController::class, 'earnings'])->name('earnings');
    Route::resource('post', PostController::class);
    // Route::resource('profile', ProfileController::class);
    Route::resource('category', CategoryController::class);
   





    Route::prefix("account")->as("account.")->group(function () {
        Route::get('bank-details', "AccountController@bankDetails")->name("bank.details");
        Route::post('bank-details/update', "AccountController@bankDetailsUpdate")->name("bank.details.update");
        Route::get('bank-details/request-code', "AccountController@requestBankChange")->name("bank.details.request_change");
    });

    Route::prefix("vendor")->as("vendor.")->group(function () {
        Route::get('/application', "VendorController@application")->name("application");
        Route::get('/dashboard', "VendorController@dashboard")->name("dashboard");
        Route::post('/store', "VendorController@store")->name("store");
        Route::post('/manual-payment', "VendorController@manualPayment")->name("manual_payment");
        Route::post('/generate-codes', "VendorController@generateCodes")->name("generate_codes");
        Route::get('approved-vendors', "VendorController@approved_vendors")->name("approved_vendors");
        Route::get('/edit/{id}', "VendorController@edit")->name("edit.vendor");
        Route::put('/update/{id}', "VendorController@update")->name("update.vendor");
    });


    Route::prefix("plans")->as("plans.")->group(function () {
        Route::get('/', "PlanController@index")->name("index");
        Route::get('/information/{plan}', "PlanController@info")->name("info");
        Route::post('/subscribe/{plan}', "PlanController@subscribe")->name("subscribe");
    });


    Route::prefix("wallet")->as("wallet.")->group(function () {
        Route::get('deposit', "WalletController@deposit")->name("deposit");
        Route::post('coupon-deposit', "WalletController@coupon_deposit")->name("coupon_deposit");
        Route::get('withdraw', "WalletController@withdraw")->name("withdraw");
        Route::post('withdraw-request', "WalletController@withdraw_request")->name("withdraw_request");
    });
});





Route::prefix("admin")->as("admin.")->namespace("Admin")->middleware(["verified", "admin"])->group(function () {
    Route::get('/dashboard',  [App\Http\Controllers\Admin\DashboardController::class, 'dashboard'])->name("dashboard");
    Route::get('/users_messages', [App\Http\Controllers\Dashboard\AdminController::class, 'usersMessages'])->name('users_messages');

    Route::resource('users', UsersController::class);
    Route::get('users/status/{id}',  [App\Http\Controllers\Admin\UsersController::class, 'status'])->name('users_status');

    Route::resource('category', CategoriesController::class);

    Route::resource('profile', ProfileController::class);

    Route::resource('post', AdminPostController::class);

    Route::resource('subscriptions', SubscriptionController::class);
    Route::resource('plans', PlansController::class);

    Route::resource('withdrawals', WithdrawalController::class);
    Route::get('withdrawal/status/{id}/{status}', "WithdrawalController@status")->name("withdrawal_status");
    Route::post('withdrawal/decline/{id}/', "WithdrawalController@decline")->name("withdrawal_decline");

    Route::resource('transactions', TransactionController::class);
    Route::get('transaction/status/{id}/{status}', "TransactionController@status")->name("transaction_status");
    Route::get('referrals', [ReferralsController::class, 'index'])->name("referrals.index");

    Route::post('{user}/make-admin', [App\Http\Controllers\Admin\DashboardController::class ,'makeadmin'])->name('make-admin');
    Route::post('{user}/remove-admin', [App\Http\Controllers\Admin\DashboardController::class ,'removeadmin'])->name('remove-admin');

    Route::resource('coupons', CouponController::class);
    Route::get('vendors', "VendorController@vendors")->name('vendors');
    Route::get('vendor/status/{id}/{status}', "VendorController@status")->name("vendor_status");


    // Route::get('image-upload', [ ImageUploadController::class, 'imageUpload' ])->name('image.upload');
    // Route::post('image-upload', [ ImageUploadController::class, 'imageUploadPost' ])->name('image.upload.post');
    // Route::get('page', [referralsController::class, 'index'])->name("page");

    Route::prefix("authorization")->as("authorization.")->namespace("Authorization")->group(function () {
        Route::resource('roles', RoleController::class);
        Route::post('roles/{id}/update-permissions', "RoleController@update_permissions")->name("roles.update_permissions");
        Route::resource('permissions', PermissionController::class);
    });

    Route::prefix("blog")->as("blog.")->namespace("Blog")->group(function () {
        Route::resource('category', CategoryController::class);
        Route::resource('posts', PostController::class);
    });
});
// Route::as("user.")->namespace("User")->middleware('verified')->group(function () {
//     Route::get('dashboard/', [App\Http\Controllers\Users\DashboardController::class, 'index'])->name('dashboard');
//     Route::resource('post', PostController::class);
//     Route::resource('category', CategoryController::class);
//     Route::resource('profile', ProfileController::class);
// });

// Route::prefix("admin")->as("admin.")->namespace("Admin")->middleware(["verified", "admin"])->group(function () {
//     Route::get('/users_messages', [App\Http\Controllers\AdminDashboardController::class, 'usersMessages'])->name('users_messages');
//     Route::get('dashboard/', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
//     Route::resource('post', AdminPostController::class);
//     Route::resource('profile', ProfileController::class);
// });

// Route::get('/', [TodosController::class,'index']);
// Route::get('/completed-todo', [TodosController::class,'completed_todo'])->name('completed-todo');
// Route::get('/completed-todo/{id}', [TodosController::class,'complete_a_todo'])->name('complete-todo');
// Route::get('/welcome', [WelcomeController::class,'welcome'])->name('tochisco');
// Route::get('/home', [HomeController::class, 'welcome'])->name('Home');



// Route::resource('todo', TodosController::class);
// Route::resource('web', IndexsController::class);
// Route::resource('property', PropertiesController::class);

// Auth::routes(['verify' => true]);

Route::get('/', [App\Http\Controllers\WelcomeController::class, 'index'])->name('home');
Route::get('/property', [App\Http\Controllers\Web\HomeController::class, 'property'])->name('property');
Route::get('/prop_comparison', [App\Http\Controllers\Web\HomeController::class, 'prop_com'])->name('prop_comparison');
Route::get('/prop_details', [App\Http\Controllers\Web\HomeController::class, 'prop_detail'])->name('prop_details');
Route::get('/prop_submit', [App\Http\Controllers\Web\HomeController::class, 'prop_sub'])->name('prop_submit');
Route::get('/agent', [App\Http\Controllers\Web\HomeController::class, 'agent'])->name('agent');
Route::get('/about', [App\Http\Controllers\Web\HomeController::class, 'about'])->name('about');
Route::get('/profile', [App\Http\Controllers\Web\HomeController::class, 'profile'])->name('profile');
Route::get('/contact', [App\Http\Controllers\Web\HomeController::class, 'contact'])->name('contact');
