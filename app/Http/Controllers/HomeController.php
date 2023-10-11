<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'active' => 'Home',
            'title' => 'Home | Carwash Wetlook',
        ]);
    }

    public function login()
    {
        return view('login', [
            'title' => 'Login | Carwash Wetlook',
        ]);
    }

    public function about()
    {
        return view('login', [
            'title' => 'Login | Carwash Wetlook',
        ]);
    }

    public function registrasi()
    {
        return view('registrasi', [
            'title' => 'Registrasi | Carwash Wetlook',
        ]);
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'nama' => 'required|max:255',
            'nomor_telepon' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|',
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role_id'] = 1;
        User::create($validatedData);
        // return $request->all();

        // $request->session()->flash('success', 'Registration Successfull, Please Login!');
        // Atau

        return redirect('/login')->with('success', 'Registration Successfull, Please Login!');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);


        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('loginError', 'Login Failed');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
