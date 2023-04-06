@extends('welcome')
@section('content')


<div class="Space_" style="height: 100px; width:100%; ">
</div>   

<table class="table table-bordered table-bordered" >
    <thead>
        <tr>
            <th scope="col">Product Code</th>
            <th scope="col">Brand Name</th>
            <th scope="col">Supplier Name</th>           
            <th scope="col">Product Quantity</th>
            <th scope="col">purchase Price</th>          
            <th scope="col">sale Price</th>          
        </tr>
    </thead>

    <tbody>
        @foreach($purchase as $value)
        <tr class="oneline" >
            <th scope="row" >{{$value->purchase_id}}</th>
            <td>{{$value->product_name}}</td>
            <td>{{$value->supplier_name}}</td>
            <td>{{$value->product_quantity}}</td>
            <td>{{$value->purchase_price}}</td>        
            <td>{{$value->sale_price}}</td>        
        </tr>
        @endforeach
    </tbody>
</table>

@endsection
