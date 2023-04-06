
@extends('welcome')
@section('content')

<div class="Space_" style="height: 100px; width:100%; "></div>  



<form bg-dark style="margin-left: 500px; margin-bottom:8px;" action="{{url('/save-supplier')}}" role="form" method="post" enctype="multipart/form-data">
    @csrf

    <div class="form-group col-md-6">
        <label for="inputAddress">Supplier Name</label>
        <input type="text" class="form-control" name="supplier_name" id="" placeholder="Enter Name" required="">
    </div>

    <div class="form-group col-md-6">
        <label for="inputAddress2">Supplier Phone</label>
        <input type="number" name="supplier_Phone_num" class="form-control" id="" placeholder="Enter Phone Number" required="">
    </div>    

    <button type="submit" class="btn btn-primary" style="margin-left: 607px; margin-bottom:8px;">SUBMIT</button>

</form>

@endsection