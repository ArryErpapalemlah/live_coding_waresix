<?php

namespace App\Http\Controllers;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class Controller extends BaseController
{
    public function index()
    {
        $title = "Login";
        return view('login', compact('title'));
    }

    public function home()
    {
        $title = "Home";
        $users = User::all();
        return view('home', compact('title', 'users'));
    }

    public function add_usr()
    {
        $title = "Add User";
        $title_form = "Add User Form";
        return view('user_add', compact('title', 'title_form'));
    }

    public function edit_usr(Request $request)
    {
        $title = "Edit User";
        $user_data = User::find($request->id);
        if (!$user_data) {
            return redirect()->back()->with('error', 'User not found');
        }
        $title_form = "Edit User Form";
        return view('user_edit', compact('title', 'title_form', 'user_data'));
    }

    // Backend Process

    public function login_process(Request $request) 
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home')->with('success', 'Login successful');
        } else {
            return redirect()->back()->with('error', 'Invalid credentials');
        }
    }

    public function logout(Request $request) 
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('directory')->with('success', 'Logout successful');
    }

    public function user_store(Request $request) 
    {
        if($request->request_submisison) {
            $check_usr = User::where('email', $request->email)->first();
            if($request->request_submission == 0) {
                if($check_usr) {
                    return redirect()->back()->with('error', 'Email already exists');
                }
    
                User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => bcrypt($request->password),
                ]);
    
                return redirect()->route('home')->with('success', 'User created successfully');
            } else {
                User::where('id', $request->id)->update([
                    'name' => $request->name,
                    'email' => $request->email,
                ]);
    
                return redirect()->route('home')->with('success', 'User updated successfully');
            }
        } else {
            $check_user = User::where('id', $request->id)->first();
            if($check_user) {
                User::where('id', $request->id)->delete();
                return redirect()->route('home')->with('success', 'User deleted successfully');
            }

            return redirect()->back()->with('error', 'User not found');
        }

    }
}
