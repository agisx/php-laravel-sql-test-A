<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/view/{id}', function (string $id) {
    try {
        $idDecrypt = decrypt($id);
    } catch (\Throwable $th) {
        return "404 Not Found";
    }
    $transaction = Transaction::
    select('no_transaction', 'transaction_date')
    ->where('transactions.id', $idDecrypt)
    ->first();

    $transactionDetails = TransactionDetail::
    select(
        'item',
        'quantity'
    )
    ->where('transaction_details.transaction_id', $idDecrypt)
    ->get();
    
    return view('view', [
        'transaction' => $transaction,
        'transaction_details' => $transactionDetails
    ]);
});

Route::get('/delete/{id}', function (string $id) {
    try {
        $idDecrypt = decrypt($id);
    } catch (\Throwable $th) {
        return "404 Not Found";
    }
    DB::transaction(function() use ($idDecrypt) {
        TransactionDetail::where('transaction_id', $idDecrypt)->delete();
        Transaction::findOrFail($idDecrypt)->delete();
    });

    return back();
});
Route::get('/edit/{id}', function (string $id) {
    try {
        $idDecrypt = decrypt($id);
    } catch (\Throwable $th) {
        return "404 Not Found";
    }
    $transaction = Transaction::
    where('transactions.id', $idDecrypt)
    ->first();

    $transactionDetails = TransactionDetail::
    where('transaction_details.transaction_id', $idDecrypt)
    ->get();
    
    return view('update', [
        'transaction' => $transaction,
        'transaction_details' => $transactionDetails
    ]);
});

Route::post('/edit', function (Request $request) {
    try {
        $transactions_id = decrypt($request->transactions_id);
        $request->transactions_id = $transactions_id;
    } catch (\Throwable $th) {
        return "403 Forbidden";
    }
    DB::transaction(function() use ($request) {
        DB::table('transactions')
        ->updateOrInsert([
            'id' => $request->transactions_id
        ],[
            'no_transaction' => $request->no_transaction,
            'transaction_date' => $request->transaction_date
        ]
        );
        
        foreach ($request->id as $key => $value) {
            DB::table('transaction_details')
            ->updateOrInsert([
                'id' => $value
            ],[
                'transaction_id' => $request->transactions_id,
                'item' => $request->item[$key],
                'quantity' => $request->quantity[$key],
            ]
            );
        }
    });

    return back();
});
Route::get('/create', function () {
    return view('create');
});
Route::post('/create', function (Request $request) {
    DB::transaction(function() use ($request) {
        $transaction = new Transaction();
        $transaction->no_transaction = $request->no_transaction;
        $transaction->transaction_date = $request->transaction_date;
        $transaction->save();

        foreach ($request->item as $key => $value) {
            $temp = new TransactionDetail();
            $temp->transaction_id = $transaction->id;
            $temp->item = $value;
            $temp->quantity = $request->quantity[$key];
            $temp->save();
        }
    });
    return back();
});
Route::get('/home', function () {
    $transactions = Transaction::
    selectRaw(
        "
        transactions.id, 
        transactions.no_transaction, 
        COUNT(transaction_details.item) as total_item,
        SUM(transaction_details.quantity) as total_quantity
        "
    )
    ->leftJoin('transaction_details', 'transaction_details.transaction_id', '=', 'transactions.id')
    ->groupBy('transactions.id')
    ->get();

    return view('home', [
        "transactions" => $transactions
    ]);
});