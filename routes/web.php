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

// route for the data-init page
// checks for required table in database, creates one if necessary, and populates it with data
Route::get('data-init', [App\Http\Controllers\DataInitController::class, 'createTable']);


Route::get('data-ready', [App\Http\Controllers\TableFillController::class, 'fillTable']);



// comment out automplete for now. try to fix it later
// Route::get('/autocomplete', [App\Http\Controllers\TypeaheadController::class, 'autocomplete'])->name('autocomplete');

// route to scraped results page
// displays the confirmed cases, recovered cases, and deaths stats
// for worldwide or specific countries
// displays one results page at a time
Route::get('scraper', [\App\Http\Controllers\ScraperController::class, 'scraper'])->name('scraper');


// route for paginated links page
// the pagination is done with use Illuminate\Pagination\LengthAwarePaginator as Paginator;
// the results are scraped
// and then paginated on the screen
Route::get('list', [App\Http\Controllers\ListScraperController::class, 'list'])->name('list');






