<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class TransactionController extends Controller
{
    //
    public function index(){
        $transactionlist = Transaction::query()->with('transactionDetails')
        ->where('user_id', Auth::user()->id)->latest()->get();

        return view('transaction.index')->with('transactionlist', $transactionlist);
    }

    public function create(){
        $cartlist = DB::table('carts')->where('user_id', Auth::user()->id)->
        rightJoin('products', 'carts.product_id', 'products.id')->select('*',
        'carts.id as id', 'products.id as product_id')->get();

        $passcode = Str::random(6);

        return view('transaction.checkout', [
            'cartlist' => $cartlist,
            'passcode' => $passcode
        ]);
    }

    public function store(Request $request){
        $request->validate([
            'passcode' => 'required|confirmed'
        ]);

        $cartlist = DB::table('carts')->where('user_id', Auth::user()->id)->
        rightJoin('products', 'carts.product_id', 'products.id')->select('*',
        'carts.id as id', 'products.id as product_id')->get();

        $th = new Transaction;
        $th['user_id'] = Auth::user()->id;
        $th->save();

        foreach($cartlist as $i){
            $td = new TransactionDetail;
            $td['transaction_id'] = $th['id'];
            $td['product_id'] = $i->product_id;
            
            $update = DB::table('products')->where('id', $i->product_id)
            ->update(['stock' => $i->stock - $i->qty]);

            $td['qty'] = $i->qty;
            $td['subtotal'] = $i->price * $i->qty;
            $td->save();
        }


        $deleted = DB::table('carts')->where('user_id', Auth::user()->id)->
        rightJoin('products', 'carts.product_id', 'products.id')->select('*',
        'carts.id as id', 'products.id as product_id')->delete();

        return redirect()->route('transaction.index')->with('status',
        'Transaction success! You will receive our products soon! Thank you for shopping with us');
    }


}
