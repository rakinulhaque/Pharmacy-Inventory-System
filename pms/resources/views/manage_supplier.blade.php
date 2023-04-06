@extends('welcome')
@section('content')

<div class="Space_" style="height: 100px; width:100%; "></div>   


<table class="table table-bordered table-bordered" >
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Name</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Action</th>
        </tr>
    </thead>

    <tbody >
        @foreach($supplier as $v_supplier)
        <tr class="oneline" >
            <th scope="row" >{{$v_supplier->supplier_id}}</th>
            <td>{{$v_supplier->supplier_name}}</td>
            <td>{{$v_supplier->supplier_Phone_num}}</td>
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">

                    <form method="post" action="{{url('/edit-supplier')}}">    
                        @csrf  
                        <input type="hidden" name="supplier_id" value="{{$v_supplier->supplier_id}}">
                        <button type="submit" class="btn btn-outline-secondary">Edit</button>
                    </form>

                    <form method="post" action="{{url('/delete-supplier')}}">
                        @csrf      
                        <input type="hidden" name="supplier_id" value="{{$v_supplier->supplier_id}}">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>

                </div>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection








