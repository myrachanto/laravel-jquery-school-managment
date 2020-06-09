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
     <div class="panel-heading">Student fee balance</div> 
        <div class="panel-body">
       <table class="table table-bordered">
      <thead>
      <tr>
          <td>Regno</td>
          <td></td>
          <td>Username</td>
          <td></td>
        </tr>
        <tr>
          <td>Email</td>
          <td></td>
          <td>Class</td>
          <td></td>
        </tr>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>amount</th>
          <th>Payments</th>
        </tr>
      </thead>
      <tbody>

       <tr>
          <td colspan="3">Balance brought forward</td>
          <td></td>
        </tr>
    @foreach($expenceflows as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> expenceid}}</td>
          <td>{{$x -> amount}}</td>
          <td></td>
        </tr>
       @endforeach
       <tr>
          <td colspan="2">Total</td>
          <td></td>
          <td></td>
        </tr>
       <tr>
          <td colspan="3">payments</td>
          <td></td>
        </tr>
       <tr>
          <td colspan="3">Balance</td>
          <td></td>
        </tr>
      </tbody>
    </table>
    </div></div></div> </div>
  @endsection