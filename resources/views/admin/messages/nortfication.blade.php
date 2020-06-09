@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                              <div class="col-lg-8">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Create a new invoice-school fee</h2></div> 
        <div class="panel-body">
 <form action="{{ url('/admin/messages/messager2')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                   <label for="receiverid">Receipient:</label>
                        <select class="form-control" id="yos" name="yos">
                        @foreach($yos as $y)
                        <option value="{{$y -> name}}">Year {{$y -> name}} study Parents/Students</option>
                        @endforeach
                        </select>
                    </div> 
            <div class="form-group">
                  <label for="name"> title:</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>  
              <div class="form-group">
                     <div class="form-group">
                  <label for="description">Message:</label>
                <textarea class="form-control" rows="5" id="message" name="message"></textarea>
                </div>
              <button type="submit" class="btn btn-default">select the list</button>
            </form>

             </div> </div> </div> 
                                           
             </div> </div>
  @endsection