@extends('test.layout')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2> Show Product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ url('sale') }}"> {{trans('test.btn_back')}}</a>
            </div>
        </div>
    </div>
   
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>P-Name:</strong>
                {{ $sale->product_name }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantity:</strong>
                {{ $sale->quantity }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Payout Amount:</strong>
                {{ $sale->price }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Status:</strong>
                @if($sale->status == 1)
                <span class="btn btn-primary">Pending</span>
                @elseif($sale->status == 2)
                <span class="btn btn-success">Paid</span>
                @else($sale->status == 3)
                <span class="btn btn-danger">Unpaid</span>
                @endif
            </div>
        </div>
    </div>
@endsection