<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BorrowRecordController;
use App\Http\Controllers\RegisterItemController;
use App\Models\Book;
use App\Models\Fine;
use App\Models\Reader;
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
    $available = Book::where('stav', 1)->get();
    $unavailable = Book::where('stav', 0)->get();

    return view('index', ["available" => $available, "unavailable" => $unavailable]);
});

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);


Route::middleware('auth')->prefix('register')->group(function () {

    Route::get('/book', [RegisterItemController::class, 'createBook'])->name('register.book.create');
    Route::post('/book', [RegisterItemController::class, 'storeBook'])->name('register.book.store');

    Route::get('/reader', [RegisterItemController::class, 'createReader'])->name('register.reader.create');
    Route::post('/reader', [RegisterItemController::class, 'storeReader'])->name('register.reader.store');

    Route::get('/librarian', [RegisterItemController::class, 'createLibrarian'])->name('register.librarian.create');
    Route::post('/librarian', [RegisterItemController::class, 'storeLibrarian'])->name('register.librarian.store');
});


Route::middleware('auth')->prefix('borrow-records')->group(function () {

    Route::get('/', [BorrowRecordController::class, 'list'])->name('borrow-records.list');

    Route::get('/create', [BorrowRecordController::class, 'create'])->name('borrow-records.create');
    Route::post('/create', [BorrowRecordController::class, 'store'])->name('borrow-records.store');

    Route::get('/close/{id}', [BorrowRecordController::class, 'close'])->name('borrow-records.close');
});

Route::get('/readers', function () {
    $readers = Reader::all();

    return view('readers', ["readers" => $readers]);
})->middleware('auth');

Route::get('/create-fine-{id}', function ($id) {
    $fine = Fine::create(["vypozicka_id" => $id, "ciastka" => 2]);

    return redirect()->back();
})->middleware('auth')->name('fine.create');
