<?php

namespace App\Http\Controllers;

use App\Books;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $books = Books::paginate(20);
        return view('index', compact('books'));
    }

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
