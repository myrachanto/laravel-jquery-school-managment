@extends('default')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                           <div class="col-lg-4">
      <div class="panel panel-default">
     <div class="panel-heading">Upload the Teacher photo</div> 
            <div class="panel-body">
            <form action="{{ url('/admin/accountant/upload') }}" method="post" enctype="multipart/form-data" >
        <div class="form-group">
                    <label for="category">accountant:</label>
                    <select class="form-control" id="teacherid" name="teacherid">
                      @foreach($accountant as $y)
                      <option value="{{$y -> id}}">{{$y -> username}}</option>
                      @endforeach
                    </select>
                  </div>
                  @if($accountant -> count()>=1 )
                   <div class="form-group">
                  <label for="foto">accountant photo:</label>
                  <input type="file" class="form-control" id="file" name="file">
                  <input type="submit" value="Upload" name="submit">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div></form>
    </div>
               @endif</div></div>
                             <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>accountant pannel</h4>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add</button></div> 
        <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>Photo</th>
          <th>First Name</th>
          <th>Last name</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($accountant as $x)
        <tr>
          <td><img src="{{asset($x->foto)}}" class="imgstyle" width="50" height="50" alt="{{$x->username}}" /></td>
          <td>{{$x -> fname}}</td>
          <td>{{$x -> lname}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
              <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Delete</button>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/accountant/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/admin/accountant/delete')}}">
    
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
            
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add A new accountant</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/admin/accountant') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                  <label for="firstname">First Name:</label>
                  <input type="text" class="form-control" id="fname" name="fname">
                </div>   <div class="form-group">
                  <label for="lastname">Last name:</label>
                  <input type="text" class="form-control" id="lname" name="lname">
                </div>     <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" id="username" name="username">
                </div>     <div class="form-group">
                  <label for="country">Country:</label>
                  <input type="text" class="form-control" id="country" name="country">
                </div>      <div class="form-group">
                  <label for="phone">Phone:</label>
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>   
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>  <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                 <div class="form-group">
                  <label for="password_confirmation">Confirm Password:</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
                <label for="spousename">Spouse Name:</label>
                  <input type="text" class="form-control" id="spousename" name="spousename">
                </div>   <div class="form-group">
                  <label for="nextofkinname">Next of kin name:</label>
                  <input type="text" class="form-control" id="nextofkinname" name="nextofkinname">
                </div>     <div class="form-group">
                  <label for="primary_p_no">Primary number:</label>
                  <input type="text" class="form-control" id="primary_p_no" name="primary_p_no">
                </div>       <div class="form-group">
                  <label for="secondary_p_no">Secondary number:</label>
                  <input type="text" class="form-control" id="secondary_p_no" name="secondary_p_no">
                </div>       <div class="form-group">
                  <label for="county">county:</label>
                  <input type="text" class="form-control" id="county" name="county">
                </div>
                     <div class="form-group">
                  <label for="p_employment">Previous employment:</label>
                <textarea class="form-control" rows="5" id="p_employment" name="p_employment"></textarea>
                </div><div class="form-group">
                  <label for="subject1">Subject one:</label>
                  <input type="text" class="form-control" id="subject1" name="subject1">
                </div>           <div class="form-group">
                  <label for="subject2">Subject two:</label>
                  <input type="text" class="form-control" id="subject2" name="subject2">
                </div>  
                
                     <div class="form-group">
                  <label for="extra_curruclum">Extra curriculum activities:</label>
                <textarea class="form-control" rows="5" id="extra_curruclum" name="extra_curruclum"></textarea>
                </div>
                 <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div></div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
    </div>
    <!-- add code ends -->
 
 <!-- View Modal start -->
    <div class="modal fade" id="viewModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">View accountant</h4>
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
    <!-- view modal ends -->
 
    <!-- Edit Modal start -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit accountant details</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/admin/accountant/update') }}" method="post">
            
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group">
                  <label for="firstname">First Name:</label>
                  <input type="text" class="form-control" id="edit_fname" name="edit_fname">
                </div>   <div class="form-group">
                  <label for="lastname">Last name:</label>
                  <input type="text" class="form-control" id="edit_lname" name="edit_lname">
                </div>     <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" id="edit_username" name="edit_username">
                </div>     <div class="form-group">
                  <label for="country">Country:</label>
                  <input type="text" class="form-control" id="edit_country" name="edit_country">
                </div>      <div class="form-group">
                  <label for="phone">Phone:</label>
                  <input type="text" class="form-control" id="edit_phone" name="edit_phone">
                </div>   
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="edit_email" name="edit_email">
                </div>  <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="edit_password" name="edit_password">
                </div>
                <label for="spousename">Spouse Name:</label>
                  <input type="text" class="form-control" id="edit_spousename" name="edit_spousename">
                </div>   <div class="form-group">
                  <label for="nextofkinname">Next of kin name:</label>
                  <input type="text" class="form-control" id="edit_nextofkinname" name="edit_nextofkinname">
                </div>     <div class="form-group">
                  <label for="primary_p_no">Primary number:</label>
                  <input type="text" class="form-control" id="edit_primary_p_no" name="edit_primary_p_no">
                </div>       <div class="form-group">
                  <label for="secondary_p_no">Secondary number:</label>
                  <input type="text" class="form-control" id="edit_secondary_p_no" name="edit_secondary_p_no">
                </div>       <div class="form-group">
                  <label for="county">county:</label>
                  <input type="text" class="form-control" id="edit_county" name="edit_county">
                </div>
                     <div class="form-group">
                  <label for="p_employment">Previous employment:</label>
                <textarea class="form-control" rows="5" id="edit_p_employment" name="edit_p_employment"></textarea>
                </div><div class="form-group">
                  <label for="subject1">Subject one:</label>
                  <input type="text" class="form-control" id="edit_subject1" name="edit_subject1">
                </div>           <div class="form-group">
                  <label for="subject2">Subject two:</label>
                  <input type="text" class="form-control" id="edit_subject2" name="edit_subject2">
                </div>  
                
                     <div class="form-group">
                  <label for="extra_curruclum">Extra curriculum activities:</label>
                <textarea class="form-control" rows="5" id="edit_extra_curruclum" name="edit_extra_curruclum"></textarea>
                </div>
               <input type="hidden" id="edit_id" name="edit_id">
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
          
        
        
      </div>
    </div>
    <!-- Edit code ends -->
 
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
 
    function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          
          $("#edit_fname").val(result.fname);
          $("#edit_lname").val(result.lname);
          $("#edit_username").val(result.username);
          $("#edit_country").val(result.country);
          $("#edit_spousename").val(result.spousename);
          $("#edit_nextofkinname").val(result.nextofkinname);
          $("#edit_primary_p_no").val(result.primary_p_no);
          $("#edit_secondary_p_no").val(result.secondary_p_no);
          $("#edit_county").val(result.county);
          $("#edit_p_employment").val(result.p_employment);
          $("#edit_subject1").val(result.subject1);
          $("#edit_subject2").val(result.subject2);
          $("#edit_extra_curruclum").val(result.extra_curruclum);
          $("#edit_email").val(result.email);
          $("#edit_id").val(result.id);
        }
      });
    }
 
    function fun_delete(id)
    {
      var conf = confirm("Are you sure want to delete???");
      if(conf){
        var delete_url = $("#hidden_delete").val();
        $.ajax({
          url: delete_url,
          type:"POST",           
          data: {"id":id,_token: "{{ csrf_token() }}"}, 
          success: function(response){
            alert(response);
            location.reload(); 
          }
        });
      }
      else{
        return false;
      }
    }
</script>
@endsection
