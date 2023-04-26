<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Manager;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
  public function login(Request $request)
  {

    $request->validate([
      'email' => 'required|email',
      'password' => 'required',
    ]);


    $manager = Manager::where('email', $request->email)->first();

    if (empty($manager) || ! Hash::check($request->password, $manager->password)) {
      throw ValidationException::withMessages([
        'email' => __('auth.failed'),
      ]);
    }

    Auth::guard('manager')->login($manager);

    return 'logado';
  }
}
