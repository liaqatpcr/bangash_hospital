<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class RegisterController extends Controller
{
    public function register()
      {
        return view('auth.register');
      }

      public function store(Request $request)
      {
          $request->validate([
              'name' => 'required|string|max:255',
              'email' => 'required|string|email|max:255|unique:users',
              'password' => 'required|string'
          ]);
          /*$data = $request->all();
        echo '<pre>';print_r($data);die;*/

          User::create([
              'name' => $request->name,
              'email' => $request->email,
              'password' => Hash::make($request->password),
              'user_type' => $request->user_type,
              'contactnumber' => $request->contactno,
              'education' => $request->education,
              'location' => $request->location,
              'skills' => $request->skills,
              'notes' => $request->notes
          ]);

          return redirect('login');
      }
}