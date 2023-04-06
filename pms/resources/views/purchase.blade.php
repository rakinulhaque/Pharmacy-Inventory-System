

@extends('welcome')
@section('content')

<form style="margin-left: 500px; margin-bottom:8px;" action="{{url('/save-purchase')}}" role="form" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group col-md-6">
        <label for="inputState">Product Name</label>
        <select id="inputState" class="form-control" name="product_name">
            @foreach($product as $value)           
            <option value="{{$value->product_name}}">{{$value->product_name}}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group col-md-6">
        <label for="inputState">Supplier Name</label>
        <select id="inputState" class="form-control" name="supplier_name">
            @foreach($supplier as $value)
            <option value="{{$value->supplier_name}}">{{$value->supplier_name}}</option>
            @endforeach
        </select>
    </div>


    <div class="form-group col-md-6">
        <label for="">Quantity</label>
        <input type="number" name="product_quantity" class="form-control" id="" placeholder="Write Quantity Here" required="">
    </div>

    <div class="form-group col-md-6">
        <label for="Procut Name">Purchase Price</label>
        <input type="number" name="purchase_price" class="form-control" id="" placeholder="purchase Procut Price" required="">
    </div>
    <div class="form-group col-md-6">
        <label for="Procut Name">Sale Price</label>
        <input type="number" name="sale_price" class="form-control" id="" placeholder="sale Product Price" required="">
    </div>

    <button type="submit" class="btn btn-primary" style="margin-left: 608px">Submit</button>
</form>


@endsection
