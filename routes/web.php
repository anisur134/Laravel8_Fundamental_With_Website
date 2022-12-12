<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\ChangePass;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\SliderController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\Multipic;
use App\Models\User;
use Laravel\Fortify\Http\Controllers\PasswordController;

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

Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

Route::get('/', function () {
    $brnds=DB::table('brands')->get();
    $abouts=DB::table('abouts')->get();
    $ports=Multipic::all();

    return view('home',compact('brnds','abouts','ports'));
});
//Route::get('/',[CategoryController::class,'index'])->name('anis');
Route::get('/all/category',[CategoryController::class,'AllCat'])->name('all.category');
Route::post('/add/category',[CategoryController::class,'AddCat'])->name('store.category');
Route::get('/edit/category/{id}',[CategoryController::class,'Edit']);
Route::post('/update/category/{id}',[CategoryController::class,'Update']);
Route::get('/delete/category/{id}',[CategoryController::class,'SoftDelete']);
Route::get('/restore/category/{id}',[CategoryController::class,'Restore']);
Route::get('/pdelete/category/{id}',[CategoryController::class,'PDelete']);
// Brand Controller
Route::get('/all/brand',[BrandController::class,'AllBrand'])->name('all.brand');
Route::post('/add/brand',[BrandController::class,'AddBrand'])->name('store.brand');
Route::get('/edit/brand/{id}',[BrandController::class,'Edit']);
Route::post('/update/brand/{id}',[BrandController::class,'Update']);
Route::get('/delete/brand/{id}',[BrandController::class,'Delete']);

Route::get('/all/img',[BrandController::class,'Multipic'])->name('all.image');
Route::post('/add/img',[BrandController::class,'Multiimage'])->name('image.brand');
//slider Controller
Route::get('/all/slider',[SliderController::class,'Slider'])->name('all.slider');
Route::get('/add/slider',[SliderController::class,'SliderAdd'])->name('add.slider');
Route::post('/store/slider',[SliderController::class,'SliderStore'])->name('store.slider');
//About Controller
Route::get('/all/about',[AboutController::class,'About'])->name('all.about');
Route::get('/add/about',[AboutController::class,'AboutAdd'])->name('add.about');
Route::post('/store/about',[AboutController::class,'AboutStore'])->name('store.about');
Route::get('/about/edit/{id}',[AboutController::class,'Edit']);
Route::post('/update/about/{id}',[AboutController::class,'UpdateAbout']);
Route::get('/about/delete/{id}',[AboutController::class,'Delete']);
//Portfoilo
Route::get('/all/port',[AboutController::class,'Portfoilo'])->name('all.port');
//Contact Controller
Route::get('/all/contact',[ContactsController::class,'ContactInfo'])->name('all.contact');
Route::get('/add/contact',[ContactsController::class,'ContactAdd'])->name('add.contact');
Route::post('/store/contact',[ContactsController::class,'ContactStore'])->name('store.contact');

Route::get('/all/con',[ContactsController::class,'ContactInpo'])->name('all.con');
Route::post('/inpo/contact',[ContactsController::class,'ContactInf'])->name('contact.form');
Route::get('/all/mess',[ContactsController::class,'ContactMess'])->name('all.mess');

//Change Password  Controller

Route::get('/all/pass',[ChangePass::class,'Cpassword'])->name('admin.password');
Route::post('/all/update',[ChangePass::class,'UpdatePassword'])->name('password.update');
//Profile Route
Route::get('/all/user',[ChangePass::class,'UserProfile'])->name('user.profile');
Route::post('/update/user',[ChangePass::class,'UserUpdate'])->name('user.update');

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified'])->group(function () {
    Route::get('/dashboard', function () {
       // $users=User::all();
       // $users=DB::table('users')->get();
        return view('admin.index');
    })->name('dashboard');
});
Route::get('/user/logout',[BrandController::class,'Logout'])->name('user.logout');