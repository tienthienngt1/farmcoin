<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\forum\HoidapController;
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

Auth::routes();


Route::view('new','index.new')->name('new');

Route::view('khuyenmai','index.khuyenmai')->name('khuyenmai');

Route::view('contact','index.lienhe')->name('lienhe');

Route::get('/test', [App\Http\Controllers\TestController::class, 'index']);
Route::post('/test', [App\Http\Controllers\TestController::class, 'index']);

Route::prefix('forum')->group(function () {
  
    Route::get('/',[App\Http\Controllers\forum\ListController::class,'index'])->name('forum');

    Route::get('/{id}',[App\Http\Controllers\forum\CategoryController::class,'show'])->where('id','[1-4]')->name('forum.category');
  
  
    Route::get('/{id}{topic}',[App\Http\Controllers\forum\RepController::class,'update'])->where('id','[1-4]');
  
    Route::group(['middleware'=>['auth']], function(){

        Route::get('/{id}/topic/{topic}',[App\Http\Controllers\forum\TopicController::class,'show'])->where('id','[1-4]')->name('forum.topic');
  
        Route::post('/{id}/topic/{topic}',[App\Http\Controllers\forum\RepController::class,'show'])->where('id','[1-4]')->name('forum.reppost');
    
        Route::view('/{id}/create','forum.create')->name('forum.create')->where('id','[1-4]')->middleware('auth');
  
        Route::post('/{id}/create',[App\Http\Controllers\forum\CreateController::class,'store'])->where('id','[1-4]')->middleware('auth')->name('forum.createpost');
    });
});


//----- Home ------

Route::group(['prefix' => 'home','middleware' => 'auth'],function () 
{
  
    Route::get('/', [App\Http\Controllers\home\HomeController::class, 'index'])->name('home');

    Route::get('/bag', [App\Http\Controllers\home\HomeController::class, 'viewBag'])->name('home.bag');
    
    Route::group(['prefix' => 'farm'],function () 
    {
    
        Route::get('/', [App\Http\Controllers\home\FarmController::class, 'viewFarm'])->name('home.farm');
        
        Route::post('/{id}', [App\Http\Controllers\home\FarmController::class, 'handleGrow'])->where('id','[1-4]')->name('farm.select.post');
        
    });
});