@extends('default')
@section('header1')
    <meta name="description" content="Chantos eschool" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
  <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
      <th>#</th>
          <th>UserNames</th>
          <th>Regno</th>
    @foreach($subject as $s)
          <th>{{$s -> name}}</th>
       @endforeach
        </tr>--> 
      </thead>
      <tbody>

    @foreach ($results as $r)
        <tr>
        <td>{{$s -> username}}</td>
        <td>{{$s -> regno}}</td>
          <td>{{$r ->
           @foreach($subject as $s)

          {{$s -> name}}

             @endforeach}}
       </td>
        </tr>
     @endforeach
      </tbody>
    </table>
</div>
@endsection