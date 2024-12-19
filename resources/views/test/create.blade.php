@extends('test.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>{{trans('test.product')}}</h2>
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
   
<form action="{{route('products.store')}}" method="POST">
    @csrf
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>P_Name:</strong>
                <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Name">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                <input class="form-control" name="quantity" id="quantity" placeholder="Quantity">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payin Amount:</strong>
                <input class="form-control"  name="payin_amount" placeholder="Payin Amount">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payout Amount:</strong>
                <input class="form-control"  name="price" placeholder="Price">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">{{trans('test.btn_submit')}}</button>
        </div>
    </div>
</form>
@endsection