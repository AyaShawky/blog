<?php

use App\Http\Controllers\dashbordController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

// Route::get('/post', function () {
//     return view('post');
// // });

// Route::get('/login', function () {
//     return view('login');
// })->name('login');

// Route::get('/tags', function () {
//     return view('admin.tags');
// });


//Route::get('/', [HomeController::class,'index']);
//Route::get('/{post}', [HomeController::class,'show']);


Route::middleware(['auth'])->group(function(){
    Route::resource('tags', TagController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('comments', CommentController::class);

});

// Route::middleware(['auth'])->group(function(){
    Route::resource('posts', PostController::class);
    Route::get('/delete/{{$item->id}}', [postController::class,'destroy']);
    Route::get(' /published/{{$item->id}}', [postController::class,'publish']);
    Route::resource('users', userController::class);
    Route::get('/dash', [dashbordController::class,'index']);
    Route::get('/search/{text}', [Controller::class,'index']);

// });

//     Route::get('/', [HomeController::class, "index"]);
//     Route::get('/{post}', [HomeController::class, "show"]);
//     Route::post('/saveComment/{post}', [HomeController::class, "saveComment"]);




Route::post('/saveComment/{post}', 'HomeController@saveComment');

Route::get('/', 'HomeController@index')->name('home');
Route::get('/post/{id}', 'HomeController@show')->name('home');
Route::get('/search/{text}', 'HomeController@search');

Auth::routes();
