@extends('main')

@section('title', 'Transaction')

@section('content')

    <div class="container">
        @if(session('status'))
            <h6 class = "alert alert-success"> {{ session('status') }}</h6>
        @endif
        @if($transactionlist->count())
            <h3>My Transactions</h3>
            @foreach($transactionlist as $transaction)

            <table class = "table table-hover align-middle">
                <thead style ="background-color: #bcd4b6;">
                    <tr>
                        <th class = "col-md-3">Product</th>
                        <th class = "col-md-2">Price</th>
                        <th class = "col-md-2">Qty</th>
                        <th class = "col-md-2">Subtotal</th>
                        <th class = "col-md-2"></th>
                    </tr>
                    <?php
                        $grandtotal = 0;
                    ?>
                </thead>
                <strong>Transaction Date: {{ $transaction->created_at }}</strong>
                <tbody>
                    @foreach($transaction->transactionDetails as $td)
                    <tr>
                    <td>
                        <img src = "{{ asset('storage/images/' . $td->product->image )}}" class = "rounded" style ="width:25px"></img>
                        {{ $td->product->name }} 
                    </td>
                    <td>IDR {{ $td->product->price }} </td>
                    <td>
                        <input disabled class ="form-control" type ="text" name = "qty" value = " {{ $td->qty }}"></input>
                    </td>
                    <td>IDR {{ $td->subtotal }}</td>
                    <?php $grandtotal += $td->subtotal ?>
                    <td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <td>
                        <td>
                        <td>
                        <td>
                        <th> IDR {{ $grandtotal }} </th>
                    </tr>
                </tfoot>
            </table>
            @endforeach
        @else
            <h3>You have no transactions</h3>
        @endif
    </div>
@endsection