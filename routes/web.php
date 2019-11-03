<?php
use App\Http\Middleware\testMiddleware;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/about','pageController@index')->name('about');
Route::get('/test','pageController@testPage');//->middleware('auth');
Route::post('post/insert','pageController@postInsert')->name('post_insert')->middleware(testMiddleware::class);
Route::get('post/update/{id}','pageController@postUpdate')->name('post_update');
Route::post('post/form/update','pageController@postFormUpdate')->name('post_form_update');
Route::get('/test1','pageController@testPage1')->name('test_page'); 
Route::get('/remove/post/{id}','pageController@removePost')->name('remove_post');
});

Route::get('/api_data','pageController@getApiData');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');//->middleware(['permission:addpost']);
Route::post('/role/insert','commonController@newRole')->name('add_role');
Route::post('/permission/insert','commonController@newPermission')->name('add_permission');
Route::post('/role/user/update','commonController@userRole')->name('user_role');
