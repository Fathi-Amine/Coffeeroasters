<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function create(){
        return view('users.register');
    }

    public function store(Request $request){
        $formFields = $request->validate([
            'first_name'=>['required', 'min:3'],
            'last_name'=>['required', 'min:3'],
            'email'=>['required','email', Rule::unique('users','email')],
            'password'=>['required', 'confirmed', 'min:8']
        ]);

        $formFields['password'] = bcrypt($formFields['password']);
        $user = User::create($formFields);
        auth()->login($user);
        return redirect('/')->with('message', 'User Created and logged in');
    }

    public function logout(Request $request){
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/')->with('message', 'You have been logged out');
    }
    public function login(){
        return view('users.login');
    }

    public function authenticate(Request $request){
        $formFields = $request->validate([
            'email'=>['required','email'],
            'password'=>'required'
        ]);

        if(auth()->attempt($formFields)){
            $request->session()->regenerate();

            return redirect('/')->with('message', 'logged');
        }

        return back()->withErrors(['email'=> 'Invalid'])->onlyInput('email');
    }

    public function edit(User $user){
        // dd($user);
        // $aaa=User::find($user);
        // dd($aaa);
        return view('users.editprofile',['user'=>$user]);
    }

    public function update(Request $request, User $user){
        $formFields = $request->validate([
            'first_name'=>'required',
            'last_name'=>['required'],
            'email'=>['required', 'email'],
        ]);
        $user->update($formFields);
        
        return back()->with('message', 'user updated successfully');
    }
    public function reset(Request $request){
        $request->validate([
            'old_password' => 'required|current_password',
            'new_password'=>'required|confirmed'
        ]);

        $user = User::find(Auth::id());
        $user->password = Hash::make($request->new_password);
        $user->save();
        return back()->with('message', 'password reset successfully');
    }
}
