<?php

use Illuminate\Support\Facades\Route;

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


// --------------------------------------------------------------------------------------/-

// Route::get('/onkar', function () {
//     return view('ankush');
// });

// Above code  file name is "ankush"  and path name is onkar , so in url add "/onkar"

// -----------------------------------------------------------------------------------------------------------


// Route::get('/onkar', function () {
//     return "<h1>Hello Direct add html here</h1>";
// });

// ---------------------------------------------------------------------------------------------------


// Route::get('/do/subFile', function () {
//     return view('firstSubFile');
// });

// Route::view('/onkar' , 'ankush');

//  Route Parameter --


    Route::get('/onkar/{id}', function (string $name) {
        return "<h1>id :".$name."</h1>";
    });


//Optional parameter   / Multi parameter


// Route::get('/onkar/{name?}/comment/{commentid?}', function (string $name = null, string $commentid = null) {
//     if ($name) {
//         return "<h1>id: " . $name . "</h1>  <h4>comment id: " . $commentid . "</h4>";
//     } else {
//         return "<h1>Here name is not passing</h1>";
//     }
// });




Route::get('/onkar/{id}', function (string $value) {
    if ($value) {
        return "<h1>id: " . $value . "</h1>";
    } else {
        return "<h1>Here value is not passing</h1>";
    }
})->whereNumber('id');


Route::get('/first-page', function () {
    return view('first');
})->name('one');

// If you need to redirect from the old URL to the new one
Route::redirect('/about-first', '/first-page');



Route::get('/about-second', function () {
    return view('second');
})->name('two');

Route::get('/about-third', function () {
    return view('third');
})->name('three');


// Group Route

Route::prefix('page')->group(function(){

    Route::get('/one' , function(){
        return  "<h1>Facebook App</h1>";
    });

    Route::get('/two' , function(){
        return  "<h1>Instagram App</h1>";
    });
    Route::get('/three' , function(){
        return  "<h1>Whats App</h1>";
    });


});

Route::fallback(function(){
    return "<h1>Page Not Found. Please write correct path. </h1>";
});