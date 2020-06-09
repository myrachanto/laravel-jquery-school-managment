@extends('default')

@section('content')
   <div class="row">
               <div class="panel-body"> <table class="table table-bordered">
      <thead>
      <tr>
          <th>First Name</th>
          <th></th>
          <th>Last name</th>
          <th></th>
        </tr>
      <tr>
          <th>Registration number</th>
          <th></th>
          <th></th>
          <th></th>
        </tr>
        <tr>
          <th>#</th>
          <th>extra - curriculum activity</th>
          <th>Achivements</th>
          <th>Year</th>
        </tr>
      </thead>
      <tbody>

    @foreach($curriculum as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> name}}</td>
          <td>{{$x -> description}}</td>
          <td></td>
          
        </tr>
       @endforeach
      </tbody>
    </table>
</div></div>
 
@endsection