@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                              <div class="col-lg-4">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Select a class to Promote</h2></div> 
        <div class="panel-body">
 <form action="{{ url('/admin/yos/promotion2')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                   <label for="acedemicyear">Class:</label>
                        <select class="form-control" id="yos" name="yos">
                        @foreach($yos as $x)
                        <option value="{{$x -> name}}">{{$x -> name}}</option>
                        @endforeach
                        </select>
                    </div>
              <button type="submit" class="btn btn-default">Get the form</button>
            </form>

             </div> </div> </div> 
                              <div class="col-lg-4">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Graduate</h2></div> 
        <div class="panel-body">
 <form action="{{ url('/admin/yos/promotion4')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                   <label for="acedemicyear">Class:</label>
                        <select class="form-control" id="yos" name="yos">
                        <option value="four">Form four</option>
                        </select>
                    </div>
              <button type="submit" class="btn btn-default">Get the form</button>
            </form>

             </div> </div> </div> 
                                <div class="col-lg-4">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Take action to a student</h2></div> 
        <div class="panel-body">
 <form action="{{ url('/admin/exam/promotion3')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                   <label for="acedemicyear">Student:</label>
                        <select class="form-control" id="student" name="student">
                        @foreach($student as $x)
                        <option value="{{$x -> username}}">{{$x -> username}}, Regno:{{$x -> username}}</option>
                        @endforeach
                        </select>
                    </div>
              <button type="submit" class="btn btn-default">Take action</button>
            </form>

             </div> </div> </div> 
             
             </div> </div>
  @endsection