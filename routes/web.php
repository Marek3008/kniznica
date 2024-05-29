<?php

use App\Models\Book;
use App\Models\BorrowRecord;
use App\Models\Fine;
use App\Models\Reader;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

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

Route::get('/login', function () {
    return view('login');
});

Route::post('/login', function(Request $request){
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
        $request->session()->regenerate();

        return redirect('/');
    }
});

Route::get('/logout', function(Request $request){
    Auth::logout();
 
    $request->session()->invalidate();
 
    $request->session()->regenerateToken();
 
    return redirect('/');
});

Route::get('/register-book', function(){
    return view('registerBook');
});

Route::post('/register-book', function(Request $request){
    $request["stav"] = 1;
    Book::create($request->all());
    return redirect('/');
});

Route::get('/borrow-records', function(){
    $ongoingRecords = BorrowRecord::whereNull('datum_vratenia')->get();
    $archivedRecords = BorrowRecord::whereNotNull('datum_vratenia')->get();

    return view('borrowRecords', ["ongoingRecords" => $ongoingRecords, "archivedRecords" => $archivedRecords]);
});

Route::get('/borrow-records/create', function(){
    $availableBooks = Book::where('stav', 1)->get();
    $readers = Reader::all();

    return view('createRecord', ["books" => $availableBooks, "readers" => $readers]);
});

Route::post('/borrow-records/create', function(Request $request){
    $request["datum_vypozicky"] = Carbon::today();
    $request["odhadovany_datum_vratenia"] = Carbon::today()->addWeeks(3);
    $request["datum_vratenia"] = null;

    BorrowRecord::create($request->all());
});

Route::get('/register-reader', function(){
    return view('registerReader');
});

Route::post('/register-reader', function(Request $request){
    Reader::create($request->all());
    return redirect('/');
});

Route::get('/close-record-{id}', function($id){
    $record = BorrowRecord::find($id);
    $record->datum_vratenia = Carbon::today();
    $record->save();

    $record->fine->delete();

    return redirect()->back();
});

Route::get('create-fine-{id}', function($id){
    $fine = Fine::create(["vypozicka_id" => $id, "ciastka" => 2]);

    return redirect()->back();
});
