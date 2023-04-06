@extends('welcome')
@section('content')


<div class="Space_" style="height: 100px; width:100%; "></div>   

<table class="table table-bordered table-bordered" >
    <thead>
        <tr>
            <th scope="col">Product Name</th>
            <th scope="col">Product Quantity</th>
            <th scope="col">Sub-Total</th>
        </tr>
    </thead>

    <tbody >
        @foreach($view_iteams as $value)
        <tr>
            <th scope="row" >{{$value->product_name}}</th>
            <td>{{$value->product_quantity}}</td>
            <td>{{$value->subtotal}}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection

