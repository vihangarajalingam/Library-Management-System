<?php

namespace App\Http\Controllers;

use App\Books;
use App\BookStatus;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * This method will:
     * Check the dates of the books that were borrowed
     * Get all the books that are not borrowed, 20 at a time
     * Show the application dashboard.
     */
    public function index()
    {
        $this->checkStatuses();
        $books = DB::table('books')
            ->join('bookstatus', 'books.id', '=', 'bookstatus.bookid')
            ->where('bookstatus.statusid', 1)
            ->paginate(20);
        return view('index', compact('books'));
    }

    /**
     * This method wil:
     * Get all the books whose status is borrowed
     * Check if the difference in date between the borrowed book and now is greater than one day
     * If it is greater than one day, change the status to active
     */
    public function checkStatuses()
    {
        $bookstatuses = BookStatus::where('statusid', 2)
            ->get();
        foreach ($bookstatuses as $bookstatus) {
            $dbTime = new \DateTime($bookstatus->updated_at);
            $now = new \DateTime();
            $timeDifference = $now->diff($dbTime);
            $differenceInDays = (integer)$timeDifference->format("%R%a");
            Log::info($differenceInDays);
            if ($differenceInDays < 0) {
                $bookstatusUpdate = BookStatus::where('bookid', $bookstatus->bookid)
                    ->update(['statusid' => 1]);
            }
        }
    }

    /**
     * Show the registration page
     */
    public function register()
    {
        return view('auth.register');
    }

    public function registerForm(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        if ($validator->fails()) {
            return back()
                ->withErrors($validator);
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return back()
            ->with('success', 'message');
    }

    public function changePassword(Request $request)
    {
        if (count($request->all()) > 0) {
            $user = User::where('id', Auth::user()->id)
                ->first();
            $validator = \Validator::make($request->all(), [
                'email' => ['required', 'email',
                    Rule::in([$user->email]),
                ],
                'password' => 'required|confirmed|min:8',
            ]);
            if ($validator->fails()) {
                return back()
                    ->withErrors($validator);
            }
            $user->password = Hash::make($request->password);
            $user->save();
            return back()
                ->with('success', 'message');
        } else {
            return view('auth.passwords.reset');
        }
    }
}
