@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                    <div class="col-lg-6">
                        <div class="panel panel-default">
                        <div class="panel-heading"><h3>View timeTable daywise</h3></div> 
                            <div class="panel-body">
                                 @foreach($teacherclass as $y)
                        <a href="{{ url('/admin/timetable/daywise') }}/{{$y -> name}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{$y -> name}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                      @endforeach
                        </div> </div> </div>
                         <div class="col-lg-6">
                        <div class="panel panel-default">
                        <div class="panel-heading"><h3>View timeTable classwise</h3></div> 
                            <div class="panel-body">
                                 @foreach($classes as $y)
                        <a href="{{ url('/admin/timetable/classwise') }}/{{$y -> name}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{$y -> name}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                      @endforeach
                        </div></div></div></div>
                
@endsection