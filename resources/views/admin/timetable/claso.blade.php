@extends('default')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
             
                             <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>Time table day wise</h4>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
        <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>Day</th>
          <th>class</th>
          <th> Morning Preps</th>
          <th>8:10-8:55</th>
          <th>8:55-9:30</th>
          <th> Break</th>
          <th>9:40-10:35</th>
          <th>10:30-11:00</th>
          <th> Break</th>
          <th>11:20-12:05</th>
          <th>12:05-12:50</th>
          <th> Lunch</th>
          <th>02:00-02:45</th>
          <th>02:45-03:30</th>
          <th>03:30-04:15</th>
          <th> Games</th>
          <th> Evening preps</th>
        </tr>
      </thead>
      <tbody>

    @foreach($teacherclass as $x)
        <tr>
          <td>{{$x -> day}}</td>
          <td>{{$x -> class}}</td>
          <th> Morning Preps</th>
          <td>{{$x -> first}}</td>
          <td>{{$x -> second}}</td>
          <th> Break</th>
          <td>{{$x -> third}}</td>
          <td>{{$x -> forth}}</td>
          <th> Break</th>
          <td>{{$x -> firth}}</td>
          <td>{{$x -> sixth}}</td>
          <th> Lunch</th>
          <td>{{$x -> seventh}}</td>
          <td>{{$x -> eighth}}</td>
          <td>{{$x -> nineth}}</td>
          <th> Games</th>
          <th> Evening preps</th>
        </tr>
       @endforeach
      </tbody>
    </table>
    </div></div></div></div>
 
@endsection

