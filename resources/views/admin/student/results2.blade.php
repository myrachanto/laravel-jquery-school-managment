@extends('default')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
             
                             <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>Student pannel</h4>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
        <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>First Name</th>
          <th>Last name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($student as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> fname}}</td>
          <td>{{$x -> lname}}</td>
          <td>
              
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>

 
   
 
    </div>
	
    </div>
</div>
    </div></div></div>
    </div>

@endsection
