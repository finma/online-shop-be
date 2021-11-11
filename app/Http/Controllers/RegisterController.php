<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'email' => 'required|email|unique:customers',
      'password' => 'required|min:6|max:255'
    ]);

    $validatedData['password'] = bcrypt($validatedData['password']);
    $validatedData['remember_token'] = Str::random(10);

    $customer = Customer::create($validatedData);

    return response()->json([
      'message' => 'Success create user customer',
      'error' => null,
      'data' => $customer
    ]);
  }
}
