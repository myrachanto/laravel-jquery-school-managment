@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
  <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>photo</th>
          <th>First Name</th>
          <th>Last name</th>
          <th>Email</th>
          <th>Phone number</th>
          <th>Take action</th>
        </tr>
      </thead>
      <tbody>

    @foreach($user as $x)
        <tr>
           <td><img src="{{asset($x->foto)}}" class="imgstyle" width="50" height="50" alt="{{$x->username}}" /></td>
          <td>{{$x -> fname}}</td>
          <td>{{$x -> lname}}</td>
          <td>{{$x -> email}}</td>
          <td>{{$x -> primary_p_no}}</td>
          <td><a href="{{ url('/admin/teacher/persona') }}/{{$x -> username}}">fire</a></td>
          
        </tr>
       @endforeach
      </tbody>
    </table>
</div>
@endsection