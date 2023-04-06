

@extends('welcome')
@section('content')


<div style="color:red; font-size:15px;  margin-left:40%"> <?php echo $message; ?> </div>

<div style=" margin-left:60%;"><a href="{{url('/confirm-page')}}">DONE</a></div>

<form style="margin-left: 500px; margin-bottom:8px;" action="{{url('/sale-add')}}" role="form" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group col-md-6">     
        <input type="text" name="product_code" class="form-control" id="product_code" placeholder="Product Code" required="">
    </div>
    <div class="form-group col-md-6">       
        <input type="number" name="product_quantity" class="form-control" id="product_quantity"  placeholder="Product Quantity" required="">
    </div>
    <button type="submit" class="btn btn-primary" style="margin-left: 19px" >SUBMIT</button>

</form>

<!----------------------------------------------------------------------------------------------------------------->

<div class="Space_" style="height: 8px; width:100%; background-color:#666666; margin-top: 20px;"></div>  


<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">serial</th>
            <th scope="col">Iteam</th>            
            <th scope="col">Price</th>
            <th scope="col">Quantity</th>
            <th scope="col">Sub-Total</th>
            <th scope="col">Action</th>
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
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">              
                    <form method="post" action="{{url('/delete-order')}}">
                        @csrf      
                        <input type="hidden" name="order_id" value="{{$value->order_id}}">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>

                </div>

            </td>


        </tr>
        @endforeach
    </tbody>
</table>

<?php
$total = 0;
foreach ($order_view as $value) {
    $total = $total + $value->subtotal;
}
?>

<div style="color:green; font-size: 20px;  margin-left:59%"> Total = {{$total}}</div>



@endsection

