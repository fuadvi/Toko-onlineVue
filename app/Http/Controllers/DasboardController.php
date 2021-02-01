<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;

class DasboardController extends Controller
{


    public function __construct()
    {
        return $this->middleware(['auth']);
    }

    public function index()
    {

        $income = Transaction::where('transaction_status', 'SUCCESS')->sum('transaction_total');
        $sales = Transaction::count();
        $items = Transaction::orderBy('id', 'DESC')->take(5)->get();
        $pie = [
            'pending' => Transaction::where('transaction_status', 'PENDING')->count(),
            'success' => Transaction::where('transaction_status', 'SUCCESS')->count(),
            'failed' => Transaction::where('transaction_status', 'FAILED')->count(),
        ];

        return view('pages.dasboard')->with([
            'income' => $income,
            'sales' => $sales,
            'items' => $items,
            'pie' => $pie,
        ]);
    }
}
