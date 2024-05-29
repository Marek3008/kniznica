<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BorrowRecord;
use App\Models\Reader;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BorrowRecordController extends Controller
{
    public function list()
    {
        $ongoingRecords = BorrowRecord::whereNull('datum_vratenia')->get();
        $archivedRecords = BorrowRecord::whereNotNull('datum_vratenia')->get();

        return view('borrowRecords', ["ongoingRecords" => $ongoingRecords, "archivedRecords" => $archivedRecords]);
    }

    public function create()
    {
        $availableBooks = Book::where('stav', 1)->get();
        $readers = Reader::all();

        return view('createRecord', ["books" => $availableBooks, "readers" => $readers]);
    }

    public function store(Request $request)
    {
        $request["datum_vypozicky"] = Carbon::today();
        $request["odhadovany_datum_vratenia"] = Carbon::today()->addWeeks(3);
        $request["datum_vratenia"] = null;

        BorrowRecord::create($request->all());

        return redirect('/borrow-records');
    }

    public function close($id)
    {
        $record = BorrowRecord::find($id);
        $record->datum_vratenia = Carbon::today();
        $record->save();

        if ($record->fine) {
            $record->fine->delete();
        }

        return redirect()->back();
    }
}
