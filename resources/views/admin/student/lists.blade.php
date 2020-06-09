@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
  <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>Photo</th>
          <th>First Name</th>
          <th>Last name</th>
          <th>Email</th>
          <th>Registration number</th>
        </tr>
      </thead>
      <tbody>

    @foreach($student as $x)
        <tr>
          <td><img src="{{asset($x->foto)}}" class="imgstyle" width="50" height="50" alt="{{$x->username}}" /></td>
          <td>{{$x -> fname}}</td>
          <td>{{$x -> lname}}</td>
          <td>{{$x -> email}}</td>
          <td>{{$x -> regno}}</td>
          
        </tr>
       @endforeach
      </tbody>
    </table>
</div>
@endsection