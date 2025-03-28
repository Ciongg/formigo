<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class SessionController extends Controller
{
    public function store(){

        $validated = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);
        
        if(!Auth::attempt($validated)){
            throw ValidationException::withMessages([
                'email' => 'this credentials does not exist'
            ]);
        }

        request()->session()->regenerate();

        return redirect('/');
    }

    public function destroy(){
        Auth::logout();

        return redirect('/');
    }
}
