@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                              <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Results</h2> of {{$exam->name}}</div> 
  <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>studentid</th>
          <th>Regno</th>
          <th>username</th>
          @foreach($subject as $s)<th>{{$s -> name}}</th>
       @endforeach
        </tr>
      </thead>
      <tbody>

    @foreach($answers as $x)
        <tr>
          <td>{{$x -> studentid}}</td>
          <td>{{$x -> regno}}</td>
          <td>{{$x -> username}}</td>
          @foreach($subject->$answers as $t)
          <td>{{$t->subject}}</td><td>{{$t->result}}</td>
       @endforeach          
        </tr>
       @endforeach
      </tbody>
    </table>
</div>
</div>
</div>
</div>
</div>
@endsection