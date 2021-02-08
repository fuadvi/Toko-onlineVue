<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\API\CheckoutRequerst;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetails;

class CheckoutController extends Controller
{
    public function checkout(CheckoutRequerst $request)
    {
        $data = $request->except('transaction_details');
        $data['uuid'] = 'TRX' . mt_rand(10000, 99999) . mt_rand(100, 999);

        $transaction = Transaction::create($data);

        foreach ($request->transaction_details as $product) {
            $details[] = new TransactionDetails([
                'transaction_id' => $transaction->id,
                'products_id' => $transaction->id,
            ]);

            Product::find($product)->decrement('quantity');
        }

        $transaction->details()->saveMany($details);

        return ResponseFromatter::success($transaction);
    }
}
