<?php

use App\Models\User;
use App\Models\Multipic;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\MultipicController;
use App\Http\Controllers\HomeAboutController;
use App\Http\Controllers\PortfolioController;
use App\Http\Controllers\ContactFormController;
use App\Http\Controllers\LanguageController;

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
//Multi Languages
Route::get('lang/{lang}', [LanguageController::class, 'SwitchLang']) -> name('lang.switch');
//Route::get('/home', [LanguageController::class, 'index']) -> name('home');
Route::get('/', [LanguageController::class, 'Languages']);

//Verify Email
Route::get('/email/verify', function()
{
    return view('auth.verify-email');
}) -> middleware(['auth']) -> name('verification.notice');

//Dynamic Home Page
Route::get('/', function ()
{
    //Query Builder
    $brands = DB::table('brands') -> get();
    $about = DB::table('home_abouts') -> first();
    //Eloquent ORM
    $portfolio = Multipic::all();
    return view('home', compact('brands', 'about', 'portfolio'));
});

//Category
// All Category
Route::get('/category/all', [CategoryController::class, 'Allcat']) -> name('all.category');

//Add Category
Route::post('/category/add', [CategoryController::class, 'Addcat']) -> name('store.category');

//Edit Category
Route::get('/category/edit/{id}', [CategoryController::class, 'Editcat']);

//Update Category
Route::post('/category/update/{id}', [CategoryController::class, 'Updatecat']);

//Soft Delete Category
Route::get('softdelete/category/{id}', [CategoryController::class, 'SoftDeletecat']);

//Restore Category
Route::get('category/restore/{id}', [CategoryController::class, 'Restorecat']);

//Delete Category Forever
Route::get('pdelete/category/{id}', [CategoryController::class, 'PDeletecat']);

//Brand
//Brand Route
Route::get('/brand/all', [BrandController::class, 'AllBrand']) -> name('all.brand');

//Insert & Save Image
Route::post('/brand/add', [BrandController::class, 'StoreBrand']) -> name('store.brand');

//Edit Brand
Route::get('/brand/edit/{id}', [BrandController::class, 'EditBrand']);

//Update Brand
Route::post('/brand/update/{id}', [BrandController::class, 'UpdateBrand']);

//Delete Brand
Route::get('/brand/delete/{id}', [BrandController::class, 'DeleteBrand']);

//Multi Image Route
Route::get('/multi/image', [MultipicController::class, 'Multipic']) -> name('multi.image');
Route::get('/multi/image', [MultipicController::class, 'Multipic']) -> name('multi.image');

//Insert & Save Multiple Images
Route::post('/multi/add', [MultipicController::class, 'StoreMultipic']) -> name('store.image');

//Admin All Routes
//SliderRoutes
Route::get('/home/slider', [HomeController::class, 'HomeSlider']) -> name('home.slider');
Route::get('/add/slider', [HomeController::class, 'AddSlider']) -> name('add.slider');
Route::post('/store/slider', [HomeController::class, 'StoreSlider']) -> name('store.slider');
Route::get('/slider/edit/{id}', [HomeController::class, 'EditSlider']);
Route::post('/slider/update/{id}', [HomeController::class, 'UpdateSlider']);
Route::get('/slider/delete/{id}', [HomeController::class, 'DeleteSlider']);

//Home About Routes
Route::get('/home/about', [HomeAboutController::class, 'HomeAbout']) -> name('home.about');
Route::get('/add/about', [HomeAboutController::class, 'AddAbout']) -> name('add.about');
Route::post('/store/about', [HomeAboutController::class, 'StoreAbout']) -> name('store.about');
Route::get('/about/edit/{id}', [HomeAboutController::class, 'EditAbout']);
Route::post('/update/homeAbout/{id}', [HomeAboutController::class, 'UpdateAbout']);
Route::get('/about/delete/{id}', [HomeAboutController::class, 'DeleteAbout']);


//Portfolio Route
Route::get('/portfolio', [PortfolioController::class, 'portfolio']) -> name('portfolio');


//Admin Contact Route
Route::get('/admin/contact', [ContactFormController::class, 'AdminContact']) -> name('admin.contact');
Route::get('/admin/add/contact', [ContactFormController::class, 'AddContact']) -> name('add.contact');
Route::post('/admin/store/contact', [ContactFormController::class, 'StoreContact']) -> name('store.contact');
Route::get('/contact/edit/{id}', [ContactFormController::class, 'EditContact']);
Route::get('/contact/delete/{id}', [ContactFormController::class, 'DeleteContact']);
Route::post('/update/contact/{id}', [ContactFormController::class, 'UpdateContact']);
Route::get('/admin/message/', [ContactFormController::class, 'AdminMessage']) -> name('admin.message');
Route::get('/admin/delete/{id}', [ContactFormController::class, 'DeleteMessage']);

//Contact Form
Route::get('/contact', [ContactFormController::class, 'Contact']) -> name('contact');
Route::post('/contact/form', [ContactFormController::class, 'ContactForm']) -> name('contact.form');


//Middleware
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function ()
{
    //Eloquent ORM
    //$users = User::all();

    //Query Builder
    $users = DB::table('users') -> get();

    return view('admin.index');
}) ->name('dashboard');


//Admin Logout
Route::get('/user/logout', [BrandController::class, 'Logout']) -> name('user.logout');

//Change Password and User Profile
Route::get('/user/password', [ChangePassword::class, 'ChangePassword']) -> name('change.password');
Route::post('/password/update', [ChangePassword::class, 'UpdatePassword']) -> name('password.update');


//User Profile
Route::get('user/profile', [ProfileController::class, 'Profile']) -> name('profile.update');
Route::post('user/update', [ProfileController::class, 'UpdateProfile']) -> name('update.user.profile');
