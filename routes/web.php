<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\SlotBookingController;
use App\Http\Controllers\ClientsController;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\BookingController;

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

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// Route::controller('/hello',App\Http\Controllers\ImplicitController::class);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('bookings',App\Http\Controllers\BookingController::class);

Route::resource('/products', ProductsController::class);

Route::get('/seed', function() {
  Artisan::call('db:seed');
  return redirect('/login');
})->name('seed');

Auth::routes();


Route::get('/slots', [SlotBookingController::class,'slots'])->name('slots');

Route::get('/booking', [SlotBookingController::class,'bookings'])->name('booking');

Route::post('/CheckSlots',[SlotBookingController::class,'CheckSlots'])->name('CheckSlots');

Route::post('/BookSlot',[SlotBookingController::class,'BookSlot'])->name('BookSlot');

Route::post('/BookDays',[SlotBookingController::class,'BookDays'])->name('BookDays');

Route::resource('clients', ClientsController::class);
Route::resource('employees', EmployeesController::class)->middleware('role');

Route::resource('companies', CompanyController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('posts', PostsController::class);
Route::get('admin.png', [CompanyController::class,'index']);

// Auth::routes(['register' => false]);

// Auth::routes([
//   'register' => false, 
//   'reset' => false,
//   'verify' => false, 
// ]);

Route::get('/orders', [App\Http\Controllers\InvoiceDetailController::class, 'index'])->name('orders.index');
Route::get('/orders/create', [App\Http\Controllers\InvoiceDetailController::class, 'create'])->name('orders.create');
Route::get('/order/{order}', [App\Http\Controllers\InvoiceDetailController::class, 'edit'])->name('orders.edit');
Route::post('/orders', [App\Http\Controllers\InvoiceDetailController::class, 'store'])->name('orders.store');
Route::delete('/order/{order}', [App\Http\Controllers\InvoiceDetailController::class, 'destroy'])->name('orders.destroy');


Route::get('dropzone', 'DropzoneController@index');

Route::post('dropzone/upload', 'DropzoneController@upload')->name('dropzone.upload');

Route::get('dropzone/fetch', 'DropzoneController@fetch')->name('dropzone.fetch');

Route::get('dropzone/delete', 'DropzoneController@delete')->name('dropzone.delete');

Route::get('image-crop', 'ImageController@imageCrop');

Route::post('image-crop', 'ImageController@imageCropPost');

// Route::get('/products/create', [App\Http\Controllers\ProductController::class,'create'])->name('product.new');  
// Route::post('/products/create', [App\Http\Controllers\ProductController::class,'store'])->name('product.store');  
// Route::get('/products/all', [App\Http\Controllers\ProductController::class,'viewProducts'])->name('product.all');

// Route::get('email-test', function(){
  
//     $details['email'] = 'komalshukla@gmail.com';
//     $details['name'] = 'komal';
//     // Mail::to($details['email'] )->send(new App\Mail\SendTestMail($details));
  
//     dispatch(new App\Jobs\SendEmailJob());
  
//     // dd('done');
// });
// Route::get('/user/{id}', function (string $id) {
//     return $id;
// })->whereIn('id', ['movie', 'song', 'painting']);

// Route::get('/search/{search}', function (string $search) {
//     return $search;
// })->where('search', '.*');

// Route::get('/user/{id}/profile', function (string $id) {
//     // ...
// })->name('profile');
 
// $url = route('profile', ['id' => 1, 'photos' => 'yes']);
 
// // /user/1/profile?photos=yes

// use App\Models\User;
 
// Route::get('/users/{user}', function (User $user) {
//     return $user->email;
// });