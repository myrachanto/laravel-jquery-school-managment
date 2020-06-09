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
     <div class="panel-heading"><h2>{{$class->name}} Results</h2> of {{$exam->name}}</div> 
  <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>studentid</th>
          <th>Regno</th>
          <th>username</th>
          <th>English</th>
          <th>Mathematics</th>
          <th>Kiswahili</th>
          <th>Biology</th>
          <th>Geography</th>
          <th>Chemistry</th>
          <th>Physics</th>
          <th>CRE</th>
          <th>History</th>
          <th>business</th>
          <th>Agriculture</th>
          <th>Total score</th>
        </tr>
      </thead>
      <tbody>

    @foreach($answers as $x)
        <tr>
          <td>{{$x -> studentid}}</td>
          <td>{{$x -> regno}}</td>
          <td>{{$x -> username}}</td>
          <td>{{$x -> English}}</td>
          <td>{{$x -> maths}}</td>
          <td>{{$x -> Kiswahili}}</td>
          <td>{{$x -> Biology}}</td>
          <td>{{$x -> Geography}}</td>
          <td>{{$x -> Chemistry}}</td>
          <td>{{$x -> Physics}}</td>
          <td>{{$x -> CRE}}</td>
          <td>{{$x -> History}}</td>
          <td>{{$x -> business}}</td>
          <td>{{$x -> Agriculture}}</td>
          <td>{{$x -> English + $x -> maths + $x -> Kiswahili + $x -> Biology+$x -> Geography+$x -> Chemistry+$x -> Chemistry
          +$x -> Physics+$x -> CRE+$x -> History+$x -> business+$x -> Agriculture}}</td>
          
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