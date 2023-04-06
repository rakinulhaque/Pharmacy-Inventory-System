@extends('welcome')
@section('content')


<div class="Space_" style="height: 100px; width:100%; ">
</div>   

<table class="table table-bordered table-bordered" >
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Product Name</th>
            <th scope="col">Product Description</th>
            <th scope="col">Action</th>
        </tr>
    </thead>

    <tbody >
        @foreach($product as $v_product)
        <tr class="oneline" >
            <th scope="row" >{{$v_product->product_id}}</th>
            <td>{{$v_product->product_name}}</td>
            <td>{{$v_product->product_description}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">

                    <form method="post" action="{{url('/edit-product')}}">    
                        @csrf  
                        <input type="hidden" name="product_id" value="{{$v_product->product_id}}">
                        <button type="submit" class="btn btn-outline-secondary">Edit</button>
                    </form>

                    <form method="post" action="{{url('/delete-product')}}">
                        @csrf      
                        <input type="hidden" name="product_id" value="{{$v_product->product_id}}">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>

                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection


