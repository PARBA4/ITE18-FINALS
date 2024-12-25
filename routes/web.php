<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ItemController;
use Illuminate\Http\Request;
use App\Models\Item;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/', function () {
    return view('dashboard'); 
})->name('dashboard');

Route::resource('item', ItemController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login.index'); // Display login form
Route::post('/login', [LoginController::class, 'login'])->name('login.post');  // Handle form submission

Route::get('/filter-items', function (Request $request) {
    $query = $request->get('query', '');

    // Filter items using Eloquent query
    $filteredItems = Item::where('name', 'like', '%' . $query . '%')->get();

    return response()->json($filteredItems);
});