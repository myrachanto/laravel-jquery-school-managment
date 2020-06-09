@extends('home')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
             
                             <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>Studentfees pannel</h4>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
        <div class="panel-body"> <table class="table table-bordered">
      <thead>
      
        <tr>
          <th>UserName</th>
          <th>{{ $student->username }}</th>
          <th></th>
          <th>Regno</th>
          <th>{{ $student->regno }}</th></tr>
          <tr>
          <th>First Name</th>
          <th>{{ $student->fname }}</th>
          <th></th>
          <th>Last Name</th>
          <th>{{ $student->lname }}</th>
        </tr><tr>
          <th>Year of study</th>
          <th>{{ $student->yos }}</th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          <th>Invoice Number</th>
          <th>payments</th>
          <th>amount</th>
          <th>Payment</th>
          <th>Balance</th>
        </tr>
      </thead>
      <tbody>

    @foreach($finance as $x)
        <tr>
          <td><a href="{{ url('/Accounts/finances/individualinvo') }}/{{$x -> invoiceno}}">{{$x -> invoiceno}}</a></td>
          <td>{{$x -> name}}</td>
          <td>{{$x -> amount}}</td>
          <td>{{$x -> payment}}</td>
          <td></td>
        </tr>
       @endforeach
       
      </tbody>
    </table>
 </div></div></div></div>
@endsection

