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

    @foreach($teacher as $x)
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
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/teacher/view')}}">
    
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
            <p><b>first Name : </b><span id="view_fname" class="text-success"></span></p>
            <p><b>last Name : </b><span id="view_lname" class="text-success"></span></p>
            <p><b>userName : </b><span id="view_username" class="text-success"></span></p>
            <p><b>country : </b><span id="view_country" class="text-success"></span></p>
            <p><b>spouse name : </b><span id="view_spousename" class="text-success"></span></p>
            <p><b>Next of kin : </b><span id="view_nextofkinname" class="text-success"></span></p>
            <p><b>Primary phone number : </b><span id="view_primary_p_no" class="text-success"></span></p>
            <p><b>secondary phone number : </b><span id="view_secondary_p_no" class="text-success"></span></p>
            <p><b>county : </b><span id="view_county" class="text-success"></span></p>
            <p><b>Previous Employment : </b><span id="view_p_employment" class="text-success"></span></p>
            <p><b>Subject  : </b><span id="view_subject1" class="text-success"></span></p>
            <p><b>Subject : </b><span id="view_subject2" class="text-success"></span></p>
            <p><b>Extra curriculum activities : </b><span id="view_extra_curruclum" class="text-success"></span></p>
            <p><b>Email : </b><span id="view_email" class="text-success"></span></p>
           </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
      </div>
    </div>
 
   
 
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
          
          $("#view_fname").text(result.fname);
          $("#view_lname").text(result.lname);
          $("#view_username").text(result.username);
          $("#view_country").text(result.country);
          $("#view_spousename").text(result.spousename);
          $("#view_nextofkinname").text(result.nextofkinname);
          $("#view_primary_p_no").text(result.primary_p_no);
          $("#view_secondary_p_no").text(result.secondary_p_no);
          $("#view_county").text(result.county);
          $("#view_p_employment").text(result.p_employment);
          $("#view_subject1").text(result.subject1);
          $("#view_subject2").text(result.subject2);
          $("#view_extra_curruclum").text(result.extra_curruclum);
          $("#view_email").text(result.email);
        }
      });
    }
</script>
@endsection

