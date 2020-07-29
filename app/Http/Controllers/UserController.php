<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function showFormRegister()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $users = User::all();
        foreach ($users as $user)
        {
            if ($request->email == $user->email){
                Session::flash('error','invalid email, try again!');
                return view('register');
            }
        }
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('show.login');
    }

    public function showFormLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        $username = $request->email;
        $password = $request->password;

        $user = [
            'email' => $username,
            'password' => $password
        ];
        if (Auth::attempt($user)){
            return redirect()->route('index');
        } else {
            Session::flash('error','email or password incorrect');
            return back();
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
