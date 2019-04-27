<?php

namespace App\Http\Controllers;

use App\Books;
use App\BookStatus;
use App\BookStatusDescription;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BookDetailsController extends Controller
{
    /**
     * This method will:
     * Get the book from the table who's ID is sent in the $request
     * Get the status of the book
     * Get the description of the status
     * Return the bookdetails page with the selected book and it's status
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
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

    /**
     * This method will change the bookstatus from active to borrowed and insert a timestamp with the current time
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function changeStatus(Request $request)
    {
        Log::info($request);
        $bookstatus = BookStatus::where('bookid', $request->id)
            ->update(['statusid' => 2, 'updated_at' => now()]);
        return redirect('/');
    }
}
