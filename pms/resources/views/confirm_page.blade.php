



@extends('welcome')
@section('content')

<?php
$total = 0;
foreach ($order_view as $value) {
    $total = $total + $value->subtotal;
}
?>


<form style="margin-left: 500px; margin-bottom:8px;" action="{{url('/confirm-order')}}" role="form" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group col-md-6">      
        <input type="text" name="customer_phone_number" class="form-control" id="customer_phone_number" placeholder="Customer Phone Number" required="">
    </div>

    <input type="hidden" name="customer_id" value="{{$order_view[0]->customer_id}}">
    <input type="hidden" name="iteams" value="{{count($order_view)}}">
    <input type="hidden" name="total" value="{{$total}}">

    <div class="form-group col-md-6">    
        <select id="product_quantity" name="payment_type" class="form-control">
            <option value="cash" selected>Cash</option>
            <option value="bkash">Bkash</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary" style="margin-left: 19px" >Confirm Order</button>

</form>

<div class="Space_" style="height: 1px; width:100%; background-color:#666666; margin-top:10px;"></div>  

<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">serial</th>
            <th scope="col">Iteam</th>            
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Sub-Total</th>
        </tr>
    </thead>
    <tbody>
        @foreach($order_view as $value)
        <tr>
            <th scope="row">{{$value->order_id}}</th>
            <td >{{$value->product_name}}</td>
            <td>{{$value->sale_price}}</td>
            <td>{{$value->product_quantity}}</td>
            <td>{{$value->subtotal}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<div style="color:green; font-size: 20px;  margin-left:74%"> Total = {{$total}}</div>





@endsection

