@extends('default')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                           <div class="col-lg-4">
      <div class="panel panel-default">
     <div class="panel-heading">Upload the student photo</div> 
        <div class="panel-body">
        <div class="form-group">
                    <label for="category">name:</label>
                    <select class="form-control" id="category" name="category">
                     
                    </select>
                  </div>
                   <div class="form-group">
                  <label for="foto">student photo:</label>
                  <input type="file" class="form-control" id="file" name="file">
                  <input type="submit" value="Upload" name="submit">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
    </div></div></div>
                             <div class="col-lg-8">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>day pannel</h4>
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
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
              
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/student/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/admin/student/delete')}}">
    
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
            
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add A new record</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/admin/student') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                    <label for="acedemicyear">Acedemic year:</label>
                    <select class="form-control" id="acedemicyear" name="acedemicyear">
                     @foreach($yearclass as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
                    </div>
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
                  <label for="regno">Registration number:</label>
                  <input type="text" class="form-control" id="regno" name="regno">
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
                <label for="fathersname">Fathers Name:</label>
                  <input type="text" class="form-control" id="fathersname" name="fathersname">
                </div>   <div class="form-group">
                  <label for="mothersname">Mothers name:</label>
                  <input type="text" class="form-control" id="mothersname" name="mothersname">
                </div>      <div class="form-group">
                  <label for="gaurdiansname">Gaurdians name:</label>
                  <input type="text" class="form-control" id="gaurdiansname" name="gaurdiansname">
                </div>         <div class="form-group">
                  <label for="primaryschool">Primary school name:</label>
                  <input type="text" class="form-control" id="primaryschool" name="primaryschool">
                </div>             <div class="form-group">
                  <label for="kcpescore">KCPE score:</label>
                  <input type="text" class="form-control" id="kcpescore" name="kcpescore">
                </div>           <div class="form-group">
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
                  <label for="primaryaddress">Primary address:</label>
                <textarea class="form-control" rows="5" id="primaryaddress" name="primaryaddress"></textarea>
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
            <h4 class="modal-title">View Category</h4>
          </div>
          <div class="modal-body">
            <p><b>Academic year : </b><span id="view_acedemicyear" class="text-success"></span></p>
            <p><b>first Name : </b><span id="view_fname" class="text-success"></span></p>
            <p><b>last Name : </b><span id="view_lname" class="text-success"></span></p>
            <p><b>userName : </b><span id="view_username" class="text-success"></span></p>
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
 
    <!-- Edit Modal start -->
    <div class="modal fade" id="editModal" role="dialog">
      <div class="modal-dialog">
      
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Edit</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/admin/student/update') }}" method="post">
            
               <input type="hidden" name="_token" value="{{ csrf_token() }}"><div class="form-group">
                    <label for="acedemicyear">Acedemic year:</label>
                    <select class="form-control" id="edit_acedemicyear" name="edit_acedemicyear">
                     @foreach($yearclass as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
                    </div>
                 <div class="form-group">
                  <label for="firstname">First Name:</label>
                  <input type="text" class="form-control" id="edit_fname" name="edit_fname">
                </div>   <div class="form-group">
                  <label for="lastname">Last name:</label>
                  <input type="text" class="form-control" id="edit_lname" name="edit_lname">
                </div>     <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" id="edit_username" name="edit_username">
                </div>   <div class="form-group">
                  <label for="phone">Registation number:</label>
                  <input type="text" class="form-control" id="edit_regno" name="edit_regno">
                </div>   
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="edit_email" name="edit_email">
                </div>  <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="edit_password" name="edit_password">
                </div>
                
                <label for="fathersname">Fathers Name:</label>
                  <input type="text" class="form-control" id="edit_fathersname" name="edit_fathersname">
                </div>   <div class="form-group">
                  <label for="nextofkinname">Mothers name:</label>
                  <input type="text" class="form-control" id="edit_mothersname" name="edit_mothersname">
                </div>   <div class="form-group">
                  <label for="nextofkinname">Gaurdian name:</label>
                  <input type="text" class="form-control" id="edit_gaurdiansname" name="edit_gaurdiansname">
                </div>       <div class="form-group">
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
                  <label for="p_employment">Primary school:</label>
                <textarea class="form-control" rows="5" id="edit_primaryschool" name="edit_primaryschool"></textarea>
                </div><div class="form-group">
                  <label for="subject1">KCPE score:</label>
                  <input type="text" class="form-control" id="edit_kcpescore" name="edit_kcpescore">
                </div>  
                     <div class="form-group">
                  <label for="extra_primaryaddress">Primary Address:</label>
                <textarea class="form-control" rows="5" id="extra_primaryaddress" name="extra_primaryaddress"></textarea>
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
          $("#view_acedemicyear").text(result.acedemicyear);
          $("#view_fname").text(result.fname);
          $("#view_lname").text(result.lname);
          $("#view_username").text(result.username);
          $("#view_regno").text(result.regno);
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
 
    function fun_edit(id)
    {
      var view_url = $("#hidden_view").val();
      $.ajax({
        url: view_url,
        type:"GET", 
        data: {"id":id}, 
        success: function(result){
          //console.log(result);
          $("#edit_acedemicyear").val(result.acedemicyear);
          $("#edit_fname").val(result.fname);
          $("#edit_lname").val(result.lname);
          $("#edit_username").val(result.username);
          $("#edit_regno").val(result.regno);
          $("#edit_fathersname").val(result.fathersname);
          $("#edit_mothersname").val(result.mothersname);
          $("#edit_gaurdiansname").val(result.gaurdiansname);
          $("#edit_primary_p_no").val(result.primary_p_no);
          $("#edit_secondary_p_no").val(result.secondary_p_no);
          $("#edit_county").val(result.county);
          $("#edit_primaryschool").val(result.primaryschool);
          $("#edit_kcpescore").val(result.kcpescore);
          $("#edit_primaryaddress").val(result.primaryaddress);
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
