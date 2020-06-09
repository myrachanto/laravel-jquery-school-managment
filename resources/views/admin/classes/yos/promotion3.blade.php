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
     <div class="panel-heading"><h2>Danger area</h2>
     </div> 
        <div class="panel-body"> 
        <form action="{{ url('/admin/yos/danger') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <table class="table table-bordered">
      <thead>
        <tr>
          <th>First Name</th>
          <th>{{$danger -> fname}}</th>
          <th>Last Name</th>
          <th>{{$danger -> lname}}</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td>Registration number</td>
          <td>{{$danger -> regno}}</td>
          <td>Year of study</td>
          <td>{{$danger -> yos}}</td>
                  </tr>

        <tr>
          <td>Fathers Name</td>
          <td>{{$danger -> fathersname}}</td>
          <td>Mothers Name</td>
          <td>{{$danger -> mothersname}}</td>
                  </tr>
        <tr>
          <td>Gaurdians Name</td>
          <td>{{$danger -> gaurdiansname}}</td>
          <td>Phone number</td>
          <td>{{$danger -> primary_p_no}}/{{$danger -> secondary_p_no}}</td>
                  </tr><tr>
          <td>Warning</td>
          <td><select class="form-control" id="warning" name="warning">
                        <option value="first warning">First warning</option>
                        <option value="second warning">Second warning</option>
                        <option value="Third warning">Third warning</option>
                          </select></td>
          <td>Grounds for Warning</td>
          <td>
                <textarea class="form-control" rows="5" id="ground" name="ground"></textarea></td>
                  </tr>
      </tbody>
      <tr><td colspan="4" align="right">
               <input type="hidden" id="name" name="studentid" value="{{$danger -> id}}">
              <button type="submit" class="btn btn-default">Submit the Warning</button></td></tr>
    </table>               
            </form>
    <!-- add code ends -->
 
             </div> </div> </div>
                              <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Danger Here</h2>
     </div> 
        <div class="panel-body"> 
        <form action="{{ url('/admin/yos/dangerexp') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <table class="table table-bordered">
      <thead>
        <tr>
          <th>First Name</th>
          <th>{{$danger -> fname}}</th>
          <th>Last Name</th>
          <th>{{$danger -> lname}}</th>
        </tr>
      </thead>
      <tbody>

        <tr>
          <td>Registration number</td>
          <td>{{$danger -> regno}}</td>
          <td>Year of study</td>
          <td>{{$danger -> yos}}</td>
                  </tr>

        <tr>
          <td>Fathers Name</td>
          <td>{{$danger -> fathersname}}</td>
          <td>Mothers Name</td>
          <td>{{$danger -> mothersname}}</td>
                  </tr>
        <tr>
          <td>Gaurdians Name</td>
          <td>{{$danger -> gaurdiansname}}</td>
          <td>Phone number</td>
          <td>{{$danger -> primary_p_no}}/{{$danger -> secondary_p_no}}</td>
                  </tr><tr>
          <td>Action</td>
          <td><select class="form-control" id="warning" name="warning">
                        <option value="expulsion">Expulsion</option>
                        <option value="discontinued">Discontinued</option>
                        <option value="other">Other</option>
                          </select></td>
          <td>Grounds</td>
          <td>
                <textarea class="form-control" rows="5" id="ground" name="ground"></textarea></td>
                  </tr>
      </tbody>
      <tr><td colspan="4" align="right">
               <input type="hidden" id="name" name="studentid" value="{{$danger -> id}}">
              <button type="submit" class="btn btn-default">Submit the expulsion</button></td></tr>
    </table>               
            </form>
    <!-- add code ends -->
 
             </div> </div> </div> </div> </div>
  @endsection