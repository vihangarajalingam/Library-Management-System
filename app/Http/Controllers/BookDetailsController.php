<?php

namespace App\Http\Controllers;

use App\Books;
use App\BookStatus;
use App\BookStatusDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookDetailsController extends Controller
{
    public function index(Request $request)
    {
        Log::info($request);
        $id = $request->id;
        $book = Books::where('id', $id)
            ->first();
        $bookstatus = BookStatus::where('bookid', $id)
            ->first();
        $statusDescription = BookStatusDescription::where('id', $bookstatus->statusid)
            ->first();
        Log::info($statusDescription);
        return view('bookdetails', compact('book', 'statusDescription'));
    }
}
