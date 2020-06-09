@extends('default')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                      
                             <div class="col-lg-8">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>{{$subj->name}} pannel</h4>
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
          <th>Class</th>
          <th>Subject</th>
          <th>Teacher</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($subteacher as $x)
        <tr>
          <td>{{$x ->class}}</td>
          <td>{{$x -> subject}}</td>
          <td>{{$x -> teacher}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
              <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Delete</button>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/subjects/$subj->name/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/admin/subjects/$subj->name/delete')}}">
    
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
            
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add A new product</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/admin/subjects') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                   <label for="acedemicyear">Class:</label>
                        <select class="form-control" id="classid" name="classid">
                        @foreach($classes as $x)
                        <option value="{{$x -> id}}">{{$x -> name}}</option>
                        @endforeach
                        </select>
                    </div>
                     <div class="form-group">
                   <label for="edit_teacher">Teacher:</label>
                        <select class="form-control" id="teacherid" name="teacherid">
                        @foreach($teacher as $z)
                        <option value="{{$z -> id}}">{{$z -> username}}</option>
                        @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                    <label for="term">Term :</label>
                    <select class="form-control" id="term" name="term">
                      <option value="one">Term One</option>
                      <option value="two">Term two</option>
                      <option value="three">Term Three</option>
                       </select>
                    </div>
              <div class="form-group">
                  <label for="expectedresults">Expected results:</label>
                <textarea class="form-control" rows="5" id="expectedresults" name="expectedresults"></textarea>
                </div>
              <div class="form-group">
                  <label for="teachersresults">Teachers results:</label>
                <textarea class="form-control" rows="5" id="teachersresults" name="teachersresults"></textarea>
                </div>
              <div class="form-group">
                  <label for="comments">Comments:</label>
                <textarea class="form-control" rows="5" id="comments" name="comments"></textarea>
                </div>
               
               <input type="hidden" id="subjectid" name="subjectid" value="{{$subj->id}}">
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
            <p><b>Class : </b><span id="view_class" class="text-success"></span></p>
            <p><b>Subject : </b><span id="view_subject" class="text-success"></span></p>
            <p><b>Teacher : </b><span id="view_teacher" class="text-success"></span></p>
            <p><b>Expected results : </b><span id="view_expectedresults" class="text-success"></span></p>
            <p><b>teacher results : </b><span id="view_teachersresults" class="text-success"></span></p>
            <p><b>comments : </b><span id="view_comments" class="text-success"></span></p>
            <p><b>term : </b><span id="view_term" class="text-success"></span></p>
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
            <form action="{{ url('/admin/subjects/$subj->name/update') }}" method="post">
            
               <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
                 <div class="form-group">
                   <label for="acedemicyear">Class:</label>
                        <select class="form-control" id="edit_classid" name="edit_classid">
                        @foreach($classes as $x)
                        <option value="{{$x -> id}}">{{$x -> name}}</option>
                        @endforeach
                        </select>
                    </div>
                     <div class="form-group">
                   <label for="acedemicyear">Teacher:</label>
                        <select class="form-control" id="edit_teacherid" name="edit_teacherid">
                        @foreach($teacher as $z)
                        <option value="{{$z -> id}}">{{$z -> username}}</option>
                        @endforeach
                        </select>
                    </div>
                      <div class="form-group">
                    <label for="term">Term :</label>
                    <select class="form-control" id="edit_term" name="edit_term">
                      <option value="one">Term One</option>
                      <option value="two">Term two</option>
                      <option value="three">Term Three</option>
                       </select>
                    </div>
              <div class="form-group">
                  <label for="expectedresults">Expected results:</label>
                <textarea class="form-control" rows="5" id="edit_expectedresults" name="edit_expectedresults"></textarea>
                </div>
                     <div class="form-group">
                  <label for="teachersresults">Teachers results:</label>
                <textarea class="form-control" rows="5" id="edit_teachersresults" name="edit_teachersresults"></textarea>
                </div>
              <div class="form-group">
                  <label for="comments">Comments:</label>
                <textarea class="form-control" rows="5" id="edit_comments" name="edit_comments"></textarea>
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
        
      </div>
      </div>
    </div>
    <!-- view modal ends -->
   
    </div>    </div>
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
          $("#view_class").text(result.class);
          $("#view_subject").text(result.subject);
          $("#view_teacher").text(result.teacher);
          $("#view_expectedresults").text(result.expectedresults);
          $("#view_teachersresults").text(result.teachersresults);
          $("#view_comments").text(result.comments);
          $("#view_term").text(result.term);
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
          $("#edit_classid").val(result.classid);
          $("#edit_subjectid").val(result.subjectid);
          $("#edit_teacherid").val(result.teacherid);
          $("#edit_expectedresults").val(result.expectedresults);
          $("#edit_teachersresults").val(result.teachersresults);
          $("#edit_comments").val(result.comments);
          $("#edit_term").val(result.term);
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
