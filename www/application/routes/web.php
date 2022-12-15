<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\BoardController;
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

Route::get('/hello', function () {
    return view('hello', [
        'name' => 'abc'
    ]);
});
//DB연동
Route::get('/conn', function () {
    return view('conn');
});
//----------------------화면구성-------------
Route::get('/main', function () {
    return view('main');
});
Route::get('/navbar', function () {
    return view('navbar');
});

Route::get('/menu', function () {
    return view('menu');
});
//--------------------------------------------//

Route::get('/test', function () {
    return view('test');
});
//----------------자유게시판-----------------------//
Route::get('/note', function () {
    return view('note');
});
Route::get('/write', function () {
    return view('write');
});
Route::get('/review', function () {
    return view('review');
});
Route::post('/insert', function () {
     return view('insert');
 });

Route::post('/search_result',[SearchController::class,'store']);
Route::get('/search_result',[SearchController::class,'search_result']);
//-------------------일기장-----------------------------------------------//
Route::get('/diary', function () {
    return view('diary');
});
Route::get('/diary_view', function () {
    return view('diary_view');
});

Route::post('/diary_upload', function () {
    return view('diary_upload');
});

Route::get('/diary_review', function () {
    return view('diary_review');
});
//------------------------------------------------//
//-------------------고객센터-----------------------------------------------//
Route::get('/service', function () {
    return view('service');
});
// Route::get('/form', function () {
//     return view('form');
// });
// Route::get('/search', function (Request $request) {
//     $search = $request->input('search');
//     return view('search', [
//         'search' => $search
//     ]);
// });
Route::get('/form',[SearchController::class,'form']);
//Route::post('/search',[SearchController::class,'store']);
//Route::get('/search',[SearchController::class,'search']);

//----------------------로그인---------------------------//

//회원가입
Route::get('/', function () {
    return view('index');
}) -> name('menu');

Route::get('register', [RegisterController::class, 'index']) -> name('register');
Route::post('register', [RegisterController::class, 'store']);
Route::post('/joinProcess', function () {
    return view('joinProcess');
});

//로그인    
/*Route::get('/login', function () {
    return view('login');
});
Route::post('/test', function (Request $request) {
    $userid = $request->input('userid');
     return view('test', [
         'test' => $userid
     ]);
});*/
Route::get('login', [LoginController::class, 'index']) -> name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout']) -> name('logout');

//Route::post('loginProcess', [RegisterController::class, 'store']);
Route::post('/loginProcess', function () {
    return view('loginProcess');
});
//로그아웃
Route::get('/logout', function () {
    return view('logout');
});
//-----------------------------------------------------//

Route::get('/', function () {
    return view('index');
}) -> name('menu');