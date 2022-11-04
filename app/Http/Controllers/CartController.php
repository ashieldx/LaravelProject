<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller 
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $user = $request->user();
        $cartlist = DB::table('carts')->where('user_id', $user->id)->
        rightJoin('products', 'carts.product_id', 'products.id')->select('*',
        'carts.id as id', 'products.id as product_id')->get();

        return view('cart.index')->with('cartlist', $cartlist);
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
    public function store(Request $request )
    {   
        $cart = new Cart;
        $cart['product_id'] = $request['product_id'];
        $cart['user_id'] = $request['user_id'];
        $cart['qty'] = $request['qty'];
        $cart['subtotal'] = $request->qty * $request['price'];

        $cart->save();
        return redirect('products')->with('status', 'Successfully added to cart');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {   
        
        $validated = $request->validate([
            'qty' => 'required|numeric|min:0'
        ]);

        $currQty = $validated['qty'];

        if($currQty == 0){
            return $this->destroy($cart);
        }

        if($currQty > $request->stock){
            return back()->with('invalid', 'Quantity cannot be greater than stock!');
        }
        $currTotal = $currQty * $request->price;

        $cart->update([
            'qty' => $currQty,
            'subtotal' => $currTotal
        ]);

        return redirect('/cart')->with('status', 'Successfully updated cart');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return redirect('/cart')->with('invalid', 'Successfully deleted product from cart');
    }
}
