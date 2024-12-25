<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    { 
        return view('login.index');
    }

    /**
     * Handle the login request.
     */
    public function login(Request $request)
    { 
        // Check if the provided credentials match static admin credentials
        if ($request->name === 'admin' && $request->password === 'admin') {
            // Redirect to the dashboard if credentials are correct
            return redirect()->route('dashboard'); // Adjust the route as needed
        }

        // Redirect back with an error if credentials are incorrect
        return back()->withErrors([
            'name' => 'Invalid credentials, please try again.',
        ]);
    }
}