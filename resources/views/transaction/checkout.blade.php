@extends('main')

@section('title', 'Checkout')

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
                <thead>
                    <tr>
                        <th class = "col-md-auto">Product</th>
                        <th class = "col-md-auto">Price</th>
                        <th class = "col-md-2">Qty</th>
                        <th class = "col-md-auto">Subtotal</th>
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
                                <input disabled class ="form-control" type ="text" name = "qty" value = " {{ $cart->qty }}"></input>
                            </div>
                        </td>
                        <td>IDR {{ $cart->subtotal }}</td>
                        <?php $grandtotal += $cart->subtotal ?>
                        <td>
                    </form>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                            <p class = "text-sm-start" style ="font-size:15px;">Ship to | {{ Auth::user()->address }}</p>
                        </td>
                        <td>
                        <td>
                        <td>
                        <th> IDR {{ $grandtotal }} </th>
                    </tr>
                </tfoot>
            </table>
            <div class = "row justify-content-end">
            <div class = "col-md-4">
                <div class ="form-group mb-2">
                    <p style ="font-size:13px;">Please enter the following passcode to checkout: {{$passcode}}</p>
                </div>
                <form action = "{{ url('/checkout') }}" method = "POST">
                    @csrf
                    <div class ="form-group mb-2">
                        <input type = "hidden" name = "passcode_confirmation" value = "{{ $passcode }}"></input>
                        <input style = "width: 350px;" class ="form-control @error('passcode') is-invalid @enderror" type = "password" name = "passcode" placeholder = "XXXXXX"></input>
                        @error('passcode')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class ="form-group mb-2">
                        <button style = "background-color: #AC94F4; border: none;width: 350px;" type = "submit" class = "btn btn-primary">Confirm</button>  
                    </div>     
                    <div class="form-group mb-2">
                    <a style = "width: 350px;" href ="{{ url('/cart') }}" class = "btn btn-danger">Cancel</a>  
                    </div>
                </form>
            </div>
            </div>
        @else
            <h3>Your cart is empty</h3>
        @endif
    </div>
@endsection