@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row"><div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading"><h2></h2>Select A student to file his performance of class {{$classes->name}}</div> 
        <div class="panel-body">
 <form action="{{ url('/admin/exam/studentwise')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                   <label for="acedemicyear">Student:</label>
                        <select class="form-control" id="studentid" name="studentid">
                        @foreach($student as $x)
                        <option value="{{$x -> id}}">{{$x -> username}}</option>
                        @endforeach
                        </select>
                    </div> 
                        <div class="form-group">
                   <label for="acedemicyear">Exam:</label>
                        <select class="form-control" id="exam" name="exam">
                        @foreach($exam as $y)
                        <option value="{{$y -> name}}">{{$y -> name}}</option>
                        @endforeach
                        </select>
                    </div>
               <input type="hidden" id="name" name="classid" value="{{$classes->id}}">
              <button type="submit" class="btn btn-default">Get the form</button>
            </form>

             </div> </div> </div> 
                                <div class="row"><div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading"><h2></h2>Select A student to Rewrite his performance of class {{$classes->name}}</div> 
        <div class="panel-body">
 <form action="{{ url('/admin/exam/rewrite')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                   <label for="acedemicyear">Student:</label>
                        <select class="form-control" id="studentid" name="studentid">
                        @foreach($student as $x)
                        <option value="{{$x -> id}}">{{$x -> username}}</option>
                        @endforeach
                        </select>
                    </div> 
                        <div class="form-group">
                   <label for="acedemicyear">Exam:</label>
                        <select class="form-control" id="examid" name="examid">
                        @foreach($exam as $y)
                        <option value="{{$y -> id}}">{{$y -> name}}</option>
                        @endforeach
                        </select>
                    </div>
               <input type="hidden" id="name" name="classid" value="{{$classes->id}}">
              <button type="submit" class="btn btn-default">Rewrite</button>
            </form>

             </div> </div> </div> 
                              
             
             </div> </div>
  @endsection