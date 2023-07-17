<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'nokp' => ['required', 'string', 'regex:/^[0-9]{6}[-\s]?[0-9]{2}[-\s]?[0-9]{4}$/'],
        ]);
    }

    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'nokp' => $data['nokp'],
        ]);
    }
    public function checkNOKP($nokp)
{
    $user = DB::table('petanibajak')->where('nokp', $nokp)->first();

    if ($user) {
        return response()->json(['exists' => true]);
    } else {
        return response()->json(['exists' => false]);
    }
}


    // public function checkNOKP($nokp)
    // {
    //     $user = User::where('nokp', $nokp)->first(); // Retrieve the user with the given NOKP

    //     if ($user) {
    //         return response()->json(['exists' => true]);
    //     } else {
    //         return response()->json(['exists' => false]);
    //     }
    // }

}
