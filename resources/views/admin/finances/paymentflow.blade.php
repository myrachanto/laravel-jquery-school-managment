@extends('default')
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
 <form action="{{ url('/admin/finances/paymentflow2')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div class="form-group">
                   <label for="acedemicyear">Student:</label>
                        <select class="form-control" id="studentid" name="studentid">
                        @foreach($student as $y)
                        <option value="{{$y -> id}}">{{$y -> username}}, Regno:{{$y -> regno}}</option>
                        @endforeach
                        </select>
                    </div>
              <button type="submit" class="btn btn-default">Get the student payment flow</button>
            </form>

             </div> </div> </div> 
                                
             
             </div> </div>
  @endsection