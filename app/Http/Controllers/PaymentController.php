<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class PaymentController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('admin.payments.index', [
      'payments' => Payment::all()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    return view('admin.payments.create');
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {
    $validatedData = $request->validate([
      'name' => 'required|max:255',
      'bank_name' => 'required|max:255',
      'no_rekening' => 'required',
      'slug' => 'required|unique:payments',
      'type' => 'required|max:255'
    ]);

    Payment::create($validatedData);

    return redirect('/payments')->with('success', 'New category has been added!');
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Payment  $payment
   * @return \Illuminate\Http\Response
   */
  public function show(Payment $payment)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Payment  $payment
   * @return \Illuminate\Http\Response
   */
  public function edit(Payment $payment)
  {
    return view('admin.payments.edit', [
      'payment' => $payment
    ]);
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Payment  $payment
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Payment $payment)
  {
    $rules = [
      'name' => 'required|max:255',
      'bank_name' => 'required|max:255',
      'no_rekening' => 'required',
      'type' => 'required|max:255'
    ];

    if ($request->slug != $payment->slug) {
      $rules['slug'] = 'required|unique:payments';
    }

    $validatedData = $request->validate($rules);

    Payment::where('id', $payment->id)->update($validatedData);

    return redirect('/payments')->with('success', 'Payment has been updated!');
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Payment  $payment
   * @return \Illuminate\Http\Response
   */
  public function destroy(Payment $payment)
  {
    Payment::destroy($payment->id);

    return redirect('/payments')->with('success', 'Payment has been deleted!');
  }

  public function checkSlug(Request $request)
  {
    $slug = SlugService::createSlug(Payment::class, 'slug', $request->no_rekening);

    return response()->json(['slug' => $slug]);
  }
}
