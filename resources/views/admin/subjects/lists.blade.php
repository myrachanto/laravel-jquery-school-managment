@extends('default')
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
                                    <div class="huge">9</div>
                                    <div>Assign subjects to teachers</div>
                                </div>
                            </div>
                        </div>  
                        @foreach($subject as $z)
                        <a href="{{ url('/admin/subjects') }}/{{$z -> name}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{$z -> name}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                      @endforeach
                    </div>
                </div>
                                        <div class="col-lg-6">
                        <div class="panel panel-default">
                        <div class="panel-heading"><h3>Assign teachers to time table</h3></div> 
                            <div class="panel-body">
                                 @foreach($teacherclass as $y)
                        <a href="{{ url('/admin/timetable') }}">
                            <div class="panel-footer">
                                <span class="pull-left">{{$y -> name}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                      @endforeach
                        </div></div></div>
                
@endsection