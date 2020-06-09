@extends('home')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
                              
<div id="about" class="container-fluid carodiv2">
                            <div class="row"><div class="col-lg-8">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>{{$invoiceno}} for Year {{$year}}-{{$term}}</h2>  </div> 
  <div class="panel-body">
        <form action="{{ url('/Accounts/finances/confirm') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>Service</th>
          <th>Year</th>
          <th>Term</th>
          <th>Amount</th>
        </tr>
      </thead>
      <tbody>

    @foreach($invoicedata as $x)
        <tr>
          <td>{{$x -> expencename}}</td>
          <td>{{$x -> year}}</td>
          <td>{{$x -> term}}</td>
          <td>KSH: {{$x -> amount}}</td>
          
        </tr>
       @endforeach
       <tr>
           <td colspan="3">Total Amount</td>
          <td><u>KSH: {{$amt}}/=</u></td>
          
        </tr>
      </tbody>
    </table>
     
               <input type="hidden" id="amt" value="{{$amt}}" name="amt">
               <input type="hidden" id="invoiceno" value="{{$invoiceno}}" name="invoiceno">
               <input type="hidden" id="year" value="{{$year}}" name="year">
               <input type="hidden" id="term" value="{{$term}}" name="term">
              <button type="submit" class="btn btn-default">Deploy the invoice</button>
</div>
</div>
</div>
</div>
@endsection