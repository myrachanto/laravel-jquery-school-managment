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
     <div class="panel-heading"><h2>Create a new invoice-school fee</h2></div> 
        <div class="panel-body">
 <form action="{{ url('/Accounts/finances/part2')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group">
                    <label for="term">Year of study :</label>
                    <select class="form-control" id="year" name="year">
                      <option value="One">Form One</option>
                      <option value="two">Form two</option>
                      <option value="Three">Form Three</option>
                      <option value="four">Form four</option>
                       </select> 
                    </div>
                        <div class="form-group">
                    <label for="term">Term :</label>
                    <select class="form-control" id="term" name="term">
                      <option value="term1">Term One</option>
                      <option value="Term2">Term two</option>
                      <option value="Term3">Term Three</option>
                       </select> 
                    </div>
              <button type="submit" class="btn btn-default">Get the invoice form</button>
            </form>

             </div> </div> </div> 
                                <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>REWRITE AN EXISTING INVOICE!!!</2></div> 
        <div class="panel-body">
 <form action="{{ url('/Accounts/finances/part3')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <input type="hidden" name="_token" value="{{ csrf_token() }}">
             
                        <div class="form-group">
                   <label for="acedemicyear">Invoiceno:</label>
                        <select class="form-control" id="invoiceno" name="invoiceno">
                        @foreach($invoice as $y)
                        <option value="{{$y -> invoiceno}}">{{$y -> invoiceno}}, Year:{{$y -> year}}, Term:{{$y -> term}}</option>
                        @endforeach
                        </select>
                    </div>
              <button type="submit" class="btn btn-default">Rewrite the invoice</button>
            </form>

             </div> </div> </div> 
             
             </div> </div>
  @endsection