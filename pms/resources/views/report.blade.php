@extends('welcome')
@section('content')

<div class="Space_" style="height: 100px; width:100%; "></div>   


<table class="table table-bordered table-bordered" >
    <thead>
        <tr>
            <th scope="col">Serial</th>
            <th scope="col">Phone Number</th>
            <th scope="col">Iteams</th>
            <th scope="col">Payment Type</th>
            <th scope="col">Total Payment</th>
            <th scope="col">Date</th>           
            <th scope="col">View Iteams</th>
        </tr>
    </thead>

    <tbody >
        @foreach($report as $value)
        <tr class="oneline" >
            <th scope="row" >{{$value->sale_id}}</th>
            <th scope="row" >{{$value->customer_Phone}}</th>
            <td>{{$value->iteams}}</td>
            <td>{{$value->payment_type}}</td>
            <td>{{$value->total}}</td>        
            <td>{{$value->updated_at}}</td>            
            <td>
                <div class="btn-group" role="group" aria-label="Basic example">

                    <form method="post" action="{{url('/view-iteams')}}">
                        @csrf      
                        <input type="hidden" name="customer_id" value="{{$value->customer_id}}">
                        <button type="submit" class="btn btn-outline-info">view</button>
                    </form>

                </div>

            </td>       
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
