<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    // return Transaction::all();
    // dd(Transaction::all());
    return view('admin.transactions.index', [
      'transactions' => Transaction::latest()->get()
    ]);
  }

  /**
   * Show the form for creating a new resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function create()
  {
    // 
  }

  /**
   * Store a newly created resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @return \Illuminate\Http\Response
   */
  public function store(Request $request)
  {

    $transaction = Transaction::create([
      'product_id' => $request->product_id,
      'payment_id' => $request->payment_id,
      'slug' => $request->slug,
      'total_item' => $request->total_item,
      'total_price' => $request->total_price,
      'customer' => $request->customer,
    ]);

    // $transaction->save();

    return response()->json([
      'message' => 'Success create new transaction',
      'data' => $transaction
    ]);
  }

  /**
   * Display the specified resource.
   *
   * @param  \App\Models\Transaction  $transaction
   * @return \Illuminate\Http\Response
   */
  public function show(Transaction $transaction)
  {
    //
  }

  /**
   * Show the form for editing the specified resource.
   *
   * @param  \App\Models\Transaction  $transaction
   * @return \Illuminate\Http\Response
   */
  public function edit(Transaction $transaction)
  {
    //
  }

  /**
   * Update the specified resource in storage.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \App\Models\Transaction  $transaction
   * @return \Illuminate\Http\Response
   */
  public function update(Request $request, Transaction $transaction)
  {
    //
  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  \App\Models\Transaction  $transaction
   * @return \Illuminate\Http\Response
   */
  public function destroy(Transaction $transaction)
  {
    //
  }

  public function accept(Transaction  $transaction)
  {
    Transaction::where('id', $transaction->id)->update([
      'status' => 'success'
    ]);

    return redirect('/transactions')->with('success', 'Transaction has been updated!');
  }

  public function reject(Transaction  $transaction)
  {
    Transaction::where('id', $transaction->id)->update([
      'status' => 'failed'
    ]);

    return redirect('/transactions')->with('success', 'Transaction has been updated!');
  }

  // API TRANSACTION

  public function indexAPI()
  {
    return response()->json([
      'message' => 'Success get transactions by user id',
      'data' => Transaction::all()
    ]);
  }

  public function detail(Transaction  $transaction)
  {
    return response()->json([
      'message' => 'Success get detail transaction!',
      'data' => $transaction
    ]);
  }
}
