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
     <div class="panel-heading"><h2>View exam results</h2></div> 
        <div class="panel-body">
 <form action="{{ url('/admin/exam/answers')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                   <label for="Class">Class:</label>
                        <select class="form-control" id="classid" name="classid">
                        @foreach($classes as $x)
                        <option value="{{$x -> id}}">{{$x -> name}}</option>
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
              <button type="submit" class="btn btn-default">view</button>
            </form>

             </div> </div> </div></div>
                
@endsection