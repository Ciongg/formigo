<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{
    //
    public function store(){
        $validated = request()->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'contact_number' => 'required',
            'password' => ['required', Password::min(6), 'confirmed']
        ]);

        
        $user = User::create($validated);

        Auth::login($user);

        return redirect('/');
    }

   
}
