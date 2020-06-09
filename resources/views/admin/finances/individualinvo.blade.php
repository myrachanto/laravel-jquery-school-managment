@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
                              
<div id="about" class="container-fluid carodiv2">
                            <div class="row"><div class="col-lg-8">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>{{$invoiceno}} </h2>  </div> 
  <div class="panel-body">
        <form action="#" method="post">
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

    @foreach($invoice as $x)
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
     
              <button type="submit" class="btn btn-default">print</button>
</div>
</div>
</div>
</div>
@endsection