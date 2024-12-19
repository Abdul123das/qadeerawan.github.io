@extends('test.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('test.index') }}"> {{trans('test.btn_back')}}</a>
            </div>
        </div>
    </div>
   
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
  
    <form action="{{ url('test/update',$product->id) }}" method="POST">
        @csrf
        @method('POST')
        <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>P_Name:</strong>
                <input type="text" name="product_name" value="{{ $product->product_name }}" class="form-control" placeholder="Name" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                <input type="text" class="form-control" name="quantity" value="{{$product->quantity}}" placeholder="Quantity" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payin Amount:</strong>
                <input type="text" class="form-control" value="{{ $product->payin_amount }}" name="payin_amount" placeholder="Payin Amount" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payout Amount:</strong>
                <input type="text" class="form-control" value="{{ $product->price }}" name="price" placeholder="Price" required>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
            <div class="dropdown">
                <select name="status" class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">
                    <option value="">Status</option>
                    <option value="1" {{ $product->status == 1 ? 'selected' : '' }}>Pending</option>
                    <option value="2" {{ $product->status == 2 ? 'selected' : '' }}>Paid</option>
                    <option value="3" {{ $product->status == 3 ? 'selected' : '' }}>Unpaid</option>
                </select>
            </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{trans('test.btn_submit')}}</button>
        </div>
    </div>
   
    </form>
@endsection