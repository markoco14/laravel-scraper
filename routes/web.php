<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\TypeaheadController;
use App\Http\Controllers\LinkScraperController;
use App\Http\Controllers\TypeaheadController;

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
//     // return view('title_of_blade.php_file')
//     // this route should use the autocomplete form / search suggestion controller
//     return view('welcome');
// });

Route::get('/', [App\Http\Controllers\TypeaheadController::class, 'index']);

Route::get('/autocomplete', [App\Http\Controllers\TypeaheadController::class, 'autocomplete'])->name('autocomplete');

// I think I could change this to '/' to make it the default home page
// but it's not necessary
// and besides, I can put the URL input in welcome
Route::get('scraper', [\App\Http\Controllers\ScraperController::class, 'scraper'])->name('scraper') ;


// route for paginated links page
// this route will also send the link data to the database
Route::get('list', [App\Http\Controllers\ListScraperController::class, 'list'])->name('list') ;


