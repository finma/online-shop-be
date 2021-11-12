<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
      'transactions' => Transaction::with(['product', 'payment', 'customer'])->latest()->get()
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
    $user = $request->user();

    if (!$user) {
      return response()->json([
        'error' => true,
        'message' => 'Not login'
      ]);
    }

    // return response()->json(['user' => $user]);

    $transaction = Transaction::create([
      'product_id' => $request->product_id,
      'payment_id' => $request->payment_id,
      'category_id' => $request->category_id,
      'total_item' => $request->total_item,
      'total_price' => $request->total_price,
      'customer_id' => $user->id,
    ]);

    // // $transaction->save();

    return response()->json([
      'message' => 'Success create new transaction',
      'data' => [
        'transaction' => $transaction,
        'customer' => $user
      ]
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

  public function indexAPI(Request $request)
  {
    $user = $request->user();

    return response()->json([
      'message' => 'Success get transactions by user id',
      'data' => Transaction::where('customer_id', $user->id)
        ->with('product', 'payment', 'category')
        ->latest()
        ->get()
      // 'user' => $user
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
