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
     <div class="panel-heading"><h2>Promote Year {{$yos}} To the Next level</h2>
     </div> 
        <div class="panel-body"> 
        <form action="#" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Regno</th>
          <th>Acedemic year</th>
          <th>Year of study</th>
        </tr>
      </thead>
      <tbody>

    @foreach($promote as $x)
        <tr>
          <td>{{$x -> username}}</td>
          <td>{{$x -> regno}}</td>
          <td>{{$x -> academicyear}}</td>
          <td>{{$x -> yos}}</td>
          
        </tr>
       @endforeach
      </tbody>
      <tr><td colspan="4" align="right">
              <button type="submit" class="btn btn-default">Print</button></td></tr>
    </table>               
            </form>
    <!-- add code ends -->
 
             </div> </div> </div> </div> </div>
  @endsection