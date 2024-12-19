@can(['view_products'])
@extends('test.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="row">
            <div class="col-sm-10 col-md-10">
                <h2>{{trans('test.title')}}</h2>
            </div>
            <div class="col-sm-2 col-md-2">
                <a class="btn btn-success" href="{{ url('test/create') }}">{{trans('test.btn_product')}}</a>
            </div>
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
            <th>Payin Amount</th>
            <th>Payout Amount</th>
            <th>Status</th>
            <th>Date</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($products as $product)
        <tr>
            <!-- <td>{{ ++$i }}</td> -->
            <td>{{ $product->product_name }}</td>
            <td>{{ $product->quantity }}</td>
            <td>{{ $product->payin_amount }}</td>
            <td>{{ $product->price }}</td>
            <td>
                @if($product->status == 1)
                <span class="btn btn-primary">Pending</span>
                @elseif($product->status == 2)
                <span class="btn btn-success">Paid</span>
                @else($product->status == 3)
                <span class="btn btn-danger">Unpaid</span>
                @endif
            </td>
            <td>{{ $product->created_at }}</td>
            <td>
                    <a class="btn btn-info" href="{{ url('test/show',$product->id) }}">Show</a>
                    <a class="btn btn-primary" href="{{ url('test/edit',$product->id) }}">Edit</a>
                    <a class="btn btn-danger" href="{{ url('test/delete',$product->id) }}">Delete</a>
            </td>
        </tr>
        <tr>
            <td>{{ $product->date }}</td>
        </tr>
        @endforeach
    </table>
  
    {!! $products->links() !!}
@endsection
@endcan\88888888888888886FFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFFJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJJF6FF866F8762