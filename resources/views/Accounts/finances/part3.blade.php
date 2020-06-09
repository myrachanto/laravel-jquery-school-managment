@extends('home')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                              <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Rewrite Invoice number {{$invoiceno}} .</h2>
     </div> 
        <div class="panel-body"> 
        <form action="{{ url('/Accounts/finances/forced') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <table class="table table-bordered">
      <thead>
        <tr>
          <th></th>
          <th>expence</th>
          <th>amount</th>
          <th>Check</th>
        </tr>
      </thead>
      <tbody>

    @foreach($expence as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> name}}</td>
          <td>          
            <input type="hidden" id="name" value="{{$x -> id}}" name="expenceid[]">
          <input type="text" class="form-control" id="amount" name="amount[]"></td>
          <td><input type="checkbox" id="checked" name="checked[]"></td>
        </tr>
       @endforeach
      </tbody>
      <tr><td colspan="4" align="right">
               <input type="hidden" id="years" value="{{$invoiceno}}" name="invoiceno">

              <button type="submit" class="btn btn-default">Submit</button></td></tr></table>
    </table>               
            </form>
    <!-- add code ends -->
 
             </div> </div> </div> </div> </div>
  @endsection