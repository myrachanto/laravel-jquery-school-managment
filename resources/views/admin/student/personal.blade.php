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
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/student/view')}}">
    
    <!-- Add Modal start -->
 
 
 <!-- View Modal start -->
    <div class="modal fade" id="viewModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">View Category</h4>
          </div>
          <div class="modal-body">
            <p><b>Academic year : </b><span id="view_acedemicyear" class="text-success"></span></p>
            <p><b>first Name : </b><span id="view_fname" class="text-success"></span></p>
            <p><b>last Name : </b><span id="view_lname" class="text-success"></span></p>
            <p><b>userName : </b><span id="view_username" class="text-success"></span></p>
            <p><b>Gender : </b><span id="view_gender" class="text-success"></span></p>
            <p><b>Registration number : </b><span id="view_regno" class="text-success"></span></p>
            <p><b>Fathers name : </b><span id="view_fathersname" class="text-success"></span></p>
            <p><b>Mothers Name : </b><span id="view_mothersname" class="text-success"></span></p>
            <p><b>Gaurdians name : </b><span id="view_gaurdiansname" class="text-success"></span></p>
            <p><b>Primary phone number : </b><span id="view_primary_p_no" class="text-success"></span></p>
            <p><b>secondary phone number : </b><span id="view_secondary_p_no" class="text-success"></span></p>
            <p><b>county : </b><span id="view_county" class="text-success"></span></p>
            <p><b>Primary school : </b><span id="view_p_primaryschool" class="text-success"></span></p>
            <p><b>KCPE score  : </b><span id="view_kcpescore" class="text-success"></span></p>
            <p><b>Primary address : </b><span id="view_primaryaddress" class="text-success"></span></p>
            <p><b>Email : </b><span id="view_email" class="text-success"></span></p>
           </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
      </div>
    </div>
    <!-- view modal ends -->
 
   
 
    </div>
	
    </div>
</div>
    </div></div></div>
    </div>
   
<script type="text/javascript">


function fun_view(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#view_acedemicyear").text(result.acedemicyear);
          $("#view_fname").text(result.fname);
          $("#view_lname").text(result.lname);
          $("#view_username").text(result.username);
          $("#view_regno").text(result.regno);
          $("#view_gender").text(result.gender);
          $("#view_fathersname").text(result.fathersname);
          $("#view_mothersname").text(result.mothersname);
          $("#view_gaurdiansname").text(result.gaurdiansname);
          $("#view_primary_p_no").text(result.primary_p_no);
          $("#view_secondary_p_no").text(result.secondary_p_no);
          $("#view_county").text(result.county);
          $("#view_primaryschool").text(result.primaryschool);
          $("#view_kcpescore").text(result.kcpescore);
          $("#view_primaryaddress").text(result.primaryaddress);
          $("#view_email").text(result.email);
        }
      });
    }

</script>
@endsection
