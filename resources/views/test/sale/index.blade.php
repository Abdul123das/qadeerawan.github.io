@extends('test.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Sale Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ url('sale/create') }}">{{trans('test.btn_product')}}</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <!-- <th>No</th> -->
            <th>Product Name</th>
            <th>Quantity</th>
            <th>Price</th>
            <th>Status</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($sales as $sale)
        <tr>
            <!-- <td>{{ ++$i }}</td> -->
            <td>{{ $sale->product_name }}</td>
            <td>{{ $sale->quantity }}</td>
            <td>{{ $sale->price }}</td>
            <td>
                @if($sale->status == 1)
                <span class="btn btn-primary">Pending</span>
                @elseif($sale->status == 2)
                <span class="btn btn-success">Paid</span>
                @else($sale->status == 3)
                <span class="btn btn-danger">Unpaid</span>
                @endif
            </td>
            <td>{{ $sale->created_at }}</td>
            <td>
                    <a class="btn btn-info" href="{{ url('sale/show',$sale->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ url('sale/edit',$sale->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ url('sale/delete',$sale->id) }}">Delete</a>
            </td>
        </tr>
        <tr>
            <td>{{ $sale->date }}</td>
        </tr>
        @endforeach
    </table>
  
    {!! $sales->links() !!}
      
@endsection