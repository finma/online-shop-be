<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class CustomerController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return Customer::all();
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    //
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function show(Customer $customer)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Customer $customer)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Customer  $customer
   * @return \Illuminate\Http\Response
   */
  public function destroy(Customer $customer)
  {
    //
  }

  // public function authenticate(Request $request)
  // {
  //   $credentials = $request->validate([
  //     'email' => 'required|email',
  //     'password' => 'required'
  //   ]);

  //   if (Auth::attempt($credentials)) {
  //     return response()->json([
  //       'message' => 'Success login',
  //       'error' => false,
  //       'data' => $request
  //     ]);
  //   }

  //   return response()->json([
  //     'message' => 'Login Failed',
  //     'error' => true,
  //   ]);
  // }

  public function login(Request $request)
  {
    $validate = Validator::make($request->all(), [
      'email' => 'required',
      'password' => 'required',
    ]);

    if ($validate->fails()) {
      $respon = [
        'status' => 'error',
        'msg' => 'Validator error',
        'errors' => $validate->errors(),
        'content' => null,
      ];
      return response()->json($respon, 200);
    } else {
      $credentials = $request->validate([
        'email' => 'required|email',
        'password' => 'required'
      ]);
      // $credentials = request(['email', 'password']);
      // $credentials = Arr::add($credentials, 'status', 'aktif');
      if (!Auth::guard('api')->attempt($credentials)) {
        $respon = [
          'status' => 'error',
          'message' => 'Unathorized',
          'errors' => null,
          'content' => $credentials,
        ];
        return response()->json($respon, 401);
      }

      $user = Customer::where('email', $request->email)->first();
      if (!Hash::check($request->password, $user->password, [])) {
        throw new \Exception('Error in Login');
      }

      $tokenResult = $user->createToken('token-auth')->plainTextToken;
      $respon = [
        'status' => 'success',
        'message' => 'Login successfully',
        'errors' => null,
        'content' => [
          'status_code' => 200,
          'access_token' => $tokenResult,
          'token_type' => 'Bearer',
        ]
      ];
      return response()->json($respon, 200);
    }
  }

  public function logout(Request $request)
  {
    $user = $request->user();
    $user->currentAccessToken()->delete();
    $respon = [
      'status' => 'success',
      'message' => 'Logout successfully',
      'errors' => null,
      'content' => null,
    ];
    return response()->json($respon, 200);
  }
}
