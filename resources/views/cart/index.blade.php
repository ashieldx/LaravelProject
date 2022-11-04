@extends('main')

@section('title', 'Cart')

@section('content')

    <div class="container">
         @if(session()->has('invalid'))
            <h6 class = "alert alert-danger"> {{ session('invalid') }}</h6>
        @endif
        @if(session('status'))
            <h6 class = "alert alert-success"> {{ session('status') }}</h6>
        @endif
        @if($cartlist->count())
            <h3>Your Cart</h3>
            <table class = "table table-striped table-hover align-middle">
                <thead style ="background-color: #bcd4b6;">
                    <tr>
                        <th class = "col-md-auto">Product</th>
                        <th class = "col-md-auto">Price</th>
                        <th class = "col-md-2">Qty</th>
                        <th class = "col-md-auto">Subtotal</th>
                        <th class = "col-md-auto"></th>
                        <th class = "col-md-auto"></th>
                    </tr>
                    <?php
                        $grandtotal = 0;
                    ?>
                </thead>
                <tbody>
                    @foreach($cartlist as $cart)
                    <tr>
                    <td>
                        <img src = "{{ asset('storage/images/' . $cart->image )}}" class = "rounded-circle" style ="width:25px"></img>
                        {{ $cart->name }} 

                    </td>
                    <td>IDR {{ $cart->price }} </td>
                    <form action = " {{ route('cart.update', $cart->id) }}" method = "POST">
                        @method('patch')
                        @csrf 
                        <td>
                            <div class="col-md-5">
                                <input type ="hidden" name ="price" value = "{{ $cart->price }}">
                                <input type ="hidden" name ="stock" value = "{{ $cart->stock }}">
                                <input class ="form-control" type ="text" name = "qty" value = " {{ $cart->qty }}"></input>
                            </div>
                        </td>
                        <td>IDR {{ $cart->subtotal }}</td>
                        <?php $grandtotal += $cart->subtotal ?>
                        <td>
                            <button style = "background-color: #AC94F4; border: none;"type = "submit" class = "btn btn-sm btn-primary">Update Cart</button>
                        </td>
                        <td>
                    </form>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td> 
                            <a style = "background-color: #AC94F4; border: none;"href = "{{ url('/checkout') }}" class = "btn btn-sm btn-primary">Checkout</a>
                    </td>
                        <td>
                        <td>
                        <td>
                        <td>
                        <th> IDR {{ $grandtotal }} </th>
                    </tr>
                </tfoot>
            </table>
        @else
            <h3>Your cart is empty</h3>
        @endif
    </div>
@endsection