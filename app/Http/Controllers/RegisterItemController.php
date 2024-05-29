<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Reader;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class RegisterItemController extends Controller
{
    public function createBook()
    {
        return view('registerBook');
    }

    public function storeBook(Request $request)
    {
        $request["stav"] = 1;
        Book::create($request->all());
        return redirect('/');
    }

    public function createReader()
    {
        return view('registerReader');
    }

    public function storeReader(Request $request)
    {
        Reader::create($request->all());
        return redirect('/');
    }

    public function createLibrarian()
    {
        return view('registerLibrarian');
    }

    public function storeLibrarian(Request $request)
    {
        User::create([
            "name" => $request["name"] . " " . $request["surname"],
            "email" => $request["email"],
            "email_verified_at" => Carbon::now(),
            "password" => Hash::make($request["password"]),
            "remember_token" => Str::random(60),
            "created_at" => Carbon::now(),
            "updated_at" => Carbon::now()
        ]);

        return redirect('/');
    }
}
