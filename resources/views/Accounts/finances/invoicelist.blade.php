@extends('home')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
 <div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/imag.jpg')}}" width="60" height="60" alt="transaction"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$invoice->count()}}</div>
                                    <div>Invoices list</div>
                                </div>
                            </div>
                        </div>  
                        @foreach($invoice as $z)
                        <a href="{{ url('/Accounts/finance/invoice') }}/{{$z -> invoiceno}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{$z -> invoiceno}}: Year{{$z -> year}}; {{$z -> term}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                      @endforeach
                    </div>
                </div></div>
                
@endsection