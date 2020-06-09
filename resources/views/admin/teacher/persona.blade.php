@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
                              
<div id="about" class="container-fluid carodiv2">
                            <div class="row"><div class="col-lg-12">
      <div class="panel panel-default">
 <form action="{{ url('/admin/yos/fire')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
     <div class="panel-heading"><h2>{{$member->username}} Profile</h2>  </div> 
  <div class="panel-body">
        <form action="#" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}"> <table class="table table-bordered">
      <tbody>
        <tr>
          <td>First name</td>
          <td>{{$member->fname}}</td>
          <td>Last name</td>
          <td>{{$member->lname}}</td>
          <td colspan="3" rowspan="4"><img src="{{asset($member->foto)}}" class="imgstyle" width="150" alt="{{$member->username}}" /></td>
        </tr>
       <tr>
           <td >Spouse Name</td>
          <td>{{$member->spousename}}</td>
           <td >Next of kin</td>
          <td>{{$member->nextofkinname}}</td>
          
        </tr><tr>
           <td >Phone number</td>
          <td>{{$member->primary_p_no}}/{{$member->secondary_p_no}}</td>
           <td >Extra curriculum activities</td>
          <td>{{$member->extra_curruclum}}</td>
          
        </tr>
       <tr>
           <td >email</td>
          <td>{{$member->email}}</td>
           <td >Subjects</td>
          <td>{{$member->subject1}} and {{$member->subject2}}</td>
          
        </tr><tr>
           <td colspan="2"><input type="hidden" id="name" value="{{$member -> id}}" name="teacherid">
              <button type="submit" class="btn btn-default">Fire the teacher</button>
            </form></td>
          <td colspan="2"><form action="{{ url('/admin/yos/hire')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <input type="hidden" id="name" value="{{$member -> id}}" name="teacherid">
              <button type="submit" class="btn btn-default">Rehire the teacher</button>
            </form></td>
          
        </tr>
      </tbody>
    </table>
            
            
 
</div>
</div>
</div>
</div>
@endsection