@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
                              
<div id="about" class="container-fluid carodiv2">
                            <div class="row"><div class="col-lg-8">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Results of {{$exam->name}}</h2>  </div> 
  <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>First name</th>
          <th>{{$student->fname}}</th>
          <th></th>
          <th>Last Name</th>
          <th>{{$student->lname}}</th>
        </tr>
        <tr>
          <th>Registration Number</th>
          <th>{{$student->regno}}</th>
          <th></th>
          <th>User name</th>
          <th>{{$student->username}}</th>
        </tr>
        <tr>
          <th>subject</th>
          <th>score</th>
          <th>Total score</th>
          <th>Grading</th>
          <th>Comments</th>
        </tr>
      </thead>
      <tbody>
       <tr>
          <th>English</th>
          <td>{{$res->English}}</td>
          <td>/100</td>
          <td>{{$e}}</td>
          <td></td>
        </tr><tr>
          <th>Mathematics</th>
          <td>{{$res->maths}}</td>
          <td>/100</td>
          <td>{{$m}}</td>
          <td></td>
        </tr><tr>
          <th>Kiswahili</th>
          <td>{{$res->Kiswahili}}</td>
          <td>/100</td>
          <td>{{$k}}</td>
          <td></td>
        </tr><tr>
          <th>Biology</th>
          <td>{{$res->Biology}}</td>
          <td>/100</td>
          <td>{{$b}}</td>
          <td></td>
        </tr><tr>
          <th>Geography</th>
          <td>{{$res->Geography}}</td>
          <td>/100</td>
          <td>{{$g}}</td>
          <td></td>
        </tr><tr>
          <th>Chemistry</th>
          <td>{{$res->Chemistry}}</td>
          <td>/100</td>
          <td>{{$c}}</td>
          <td></td>
        </tr><tr>
          <th>Physics</th>
          <td>{{$res->Physics}}</td>
          <td>/100</td>
          <td>{{$p}}</td>
          <td></td>
        </tr><tr>
          <th>CRE</th>
          <td>{{$res->CRE}}</td>
          <td>/100</td>
          <td>{{$cre}}</td>
          <td></td>
        </tr><tr>
          <th>History</th>
          <td>{{$res->History}}</td>
          <td>/100</td>
          <td>{{$h}}</td>
          <td></td>
        </tr><tr>
          <th>business</th>
          <td>{{$res->business}}</td>
          <td>/100</td>
          <td>{{$biz}}</td>
          <td></td>
        </tr><tr>
          <th>Agriculture</th>
          <td>{{$res->Agriculture}}</td>
          <td>/100</td>
          <td>{{$a}}</td>
          <td></td>
        </tr>
       <tr>
           <td >Total Score</td>
          <td><u>{{$res -> English + $res -> maths + $res -> Kiswahili + $res -> Biology+$res -> Geography+$res -> Chemistry+$res -> Chemistry
          +$res -> Physics+$res -> CRE+$res -> History+$res -> business+$res -> Agriculture}}</u></td>
          <td>/1100</td>
          <td></td>
          <td></td>
          
        </tr>
      </tbody>
    </table>
    
              <button type="submit" class="btn btn-default">print</button>
</div>
</div>
</div>
</div>
@endsection