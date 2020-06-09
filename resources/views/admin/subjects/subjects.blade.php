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
          <th>Name</th>
          <th>Description</th>
        </tr>
      </thead>
      <tbody>

    @foreach($subject as $x)
        <tr>
          <td><img src="{{asset($x->foto)}}" class="imgstyle" width="50" height="50" alt="{{$x->username}}" /></td>
          <td>{{$x -> name}}</td>
          <td>{{$x -> description}}</td>
          
        </tr>
       @endforeach
      </tbody>
    </table>
</div>
@endsection