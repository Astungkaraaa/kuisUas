<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('register.index');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $validatedData =  $request->validate([
            'name' => ['required', 'string', 'max:20', 'min:1'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email', 'email:dns'],
            'datingCode' => ['required', 'max:3', 'min:3'],
            'dob' => ['required', 'before:today'],
            'gender' => ['required'],
            'phoneNumber' => ['required', 'min:10', 'max:13', 'regex:/^\+65/'],
            'img'=>['required', 'image', 'max:1024', 'file'],
            'password' => ['required', 'min:5', 'max:20'],
        ]);

        $validatedData['dating_id'] = 'SKY'.$request->datingCode.'0'.$request->gender;
        $validatedData['img'] = $request->file('img')->store('profile-images');
        $validatedData['password'] = Hash::make($validatedData['password']);

        $user = User::all();

        foreach ($user as $u ){
            if($u->gender === $request->gender && $u->datingCode === $request->datingCode){
                return redirect('/register')->with('filed', 'datingCode have been used');
            }   
        }

        $user = User::create($validatedData);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('success','Selamat akun anda berhasil dibuat anda dabat login dengan '.$request->email.' atau '. $validatedData['dating_id'] );
    }
}
