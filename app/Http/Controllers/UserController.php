<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

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

    public function show_reset_form(){
        return view('users.resetpassword');
    }

    public function sendResetLink(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',

        ]);
        $token = Str::random(64);
        DB::table('password_resets')->insert([
            'email'=>$request->email,
            'tokens'=>$token,
        ]);
        $action_link = route('reset.form',['token'=>$token, 'email'=>$request->email]);
        $body = "We see that you requested a password reset For logging to: <b> COFFEROASTERS Menu</b> account associated with $request->email You can reset the password by clicking the link below";
        Mail::send('users.passreset',['action_link'=>$action_link, 'body'=>$body],function($message) use ($request){
            $message->from('noreply@youcode.school', 'COFFEEROASTERS');
            $message->to($request->email, 'Youcode')->subject('Password Reset');
        });
        return back()->with('success', 'reset successfull');
    }

    public function showResetForm(Request $request, $token = null){
        return view('users.resetform')->with(['token'=>$token, 'email'=>$request->email]);
    }

    public function passwordReset(Request $request){
        $request->validate([
            'email'=>'required|email|exists:users,email',
            'password'=>'required|confirmed'
        ]);

        $check_token = DB::table('password_resets')->where([
            'email'=>$request->email,
            'tokens'=>$request->token
        ])->first();

        if(!$check_token){
            return back()->withInput()->with('fail reset');
        }else{
            User::where('email',$request->email)->update(['password'=>Hash::make($request->password)]);
            DB::table('password_resets')->where(['email'=>$request->email])->delete();
        }

        return redirect('/login');

    }
}
