@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                              <div class="col-lg-8">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Select class to view</h2></div> 
        <div class="panel-body">
                                @foreach($yos as $z)
                        <a href="{{ url('/admin/yos/viewclass')}}/{{$z -> name}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{$z -> name}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                   
                      @endforeach

             </div> </div> </div> 
             </div> </div>
  @endsection