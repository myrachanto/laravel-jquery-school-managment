@extends('default')

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                              <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Studentwise : {{$exam->name}} results</h2>
     </div> 
        <div class="panel-body"> 
        <form action="{{ url('/admin/exam/write') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>First name</th>
          <th>{{$student->fname}}</th>
          <th>Last Name</th>
          <th>{{$student->lname}}</th>
        </tr>
        <tr>
          <th>Registration Number</th>
          <th>{{$student->regno}}</th>
          <th>User name</th>
          <th>{{$student->username}}</th>
        </tr>
        <tr>
          <th>English</th>
          <td><input type="text"  id="English" name="English" value="{{$res->English}}"></td>
        </tr><tr>
          <th>Mathematics</th>
          <td><input type="text"  id="maths" name="maths" value="{{$res->maths}}"></td>
        </tr><tr>
          <th>Kiswahili</th>
          <td><input type="text"  id="Kiswahili" name="Kiswahili" value="{{$res->Kiswahili}}"></td>
        </tr><tr>
          <th>Biology</th>
          <td><input type="text"  id="Biology" name="Biology" value="{{$res->Biology}}"></td>
        </tr><tr>
          <th>Geography</th>
          <td><input type="text"  id="Geography" name="Geography" value="{{$res->Geography}}"></td>
        </tr><tr>
          <th>Chemistry</th>
          <td><input type="text"  id="Chemistry" name="Chemistry" value="{{$res->Chemistry}}"></td>
        </tr><tr>
          <th>Physics</th>
          <td><input type="text"  id="Physics" name="Physics" value="{{$res->Physics}}"></td>
        </tr><tr>
          <th>CRE</th>
          <td><input type="text"  id="CRE" name="CRE" value="{{$res->CRE}}"></td>
        </tr><tr>
          <th>History</th>
          <td><input type="text"  id="History" name="History" value="{{$res->History}}"></td>
        </tr><tr>
          <th>business</th>
          <td><input type="text"  id="business" name="business" value="{{$res->business}}"></td>
        </tr><tr>
          <th>Agriculture</th>
          <td><input type="text"  id="Agriculture" name="Agriculture" value="{{$res->Agriculture}}"></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td colspan="4">
               <input type="hidden" id="name" name="studentid" value="{{$student->id}}">
               <input type="hidden" id="name" name="classid" value="{{$classid}}">
               <input type="hidden" id="name" name="examid" value="{{$exam->id}}">
              <button type="submit" class="btn btn-default">submit</button></td>
          
        </tr>
      </tbody>
    </table>
            </form>
    <!-- add code ends -->
 
             </div> </div> </div> </div> </div>
</script>
  @endsection