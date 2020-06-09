@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row"> <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>Extra-curriculum pannel</h4>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
    <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">Add</button></div> 
        <div class="panel-body"> 
             <table class="table table-bordered">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Description</th>
          <th>Team</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($extra as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> curriculumid}}</td>
          <td>{{$x -> description}}</td>
          <td>{{$x -> team}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
              
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/extra/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/admin/extra/delete')}}">
    
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
            
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add The activity</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/admin/extra') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="form-group">
                   <label for="Class">Class:</label>
                        <select class="form-control" id="classid" name="classid">
                        @foreach($classes as $x)
                        <option value="{{$x -> id}}">{{$x -> name}}</option>
                        @endforeach
                        </select>
                    </div>
                <div class="form-group">
                   <label for="activity">Activity:</label>
                        <select class="form-control" id="curriculumid" name="curriculumid">
                        @foreach($curriculum as $x)
                        <option value="{{$x -> id}}">{{$x -> name}}</option>
                        @endforeach
                        </select>
                    </div>
              <div class="form-group">
                  <label for="team">Team:</label>
                <textarea class="form-control" rows="5" id="team" name="team"></textarea>
                </div>
              <div class="form-group">
                  <label for="description">Description:</label>
                <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                </div>
              <div class="form-group">
                  <label for="success">Achievements:</label>
                <textarea class="form-control" rows="5" id="achievements" name="achievements"></textarea>
                </div>  
              <div class="form-group">
                  <label for="comments">Comments:</label>
                <textarea class="form-control" rows="5" id="comments" name="comments"></textarea>
                </div>
              <button type="submit" class="btn btn-default">add</button>
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
            <p><b>Class : </b><span id="view_classid" class="text-success"></span></p>
            <p><b>Activity : </b><span id="view_curriculumid" class="text-success"></span></p>
            <p><b>team : </b><span id="view_team" class="text-success"></span></p>
            <p><b>Description : </b><span id="view_description" class="text-success"></span></p>
            <p><b>Achievements : </b><span id="view_achievements" class="text-success"></span></p>
            <p><b>Comments : </b><span id="view_comments" class="text-success"></span></p>
           </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
      </div>
    </div>
    <!-- view modal ends -->
             </div></div>
                

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
            <form action="{{ url('/admin/extra/update') }}" method="post">
            
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div class="form-group">
                   <label for="Class">Class:</label>
                        <select class="form-control" id="edit_classid" name="edit_classid">
                        @foreach($classes as $x)
                        <option value="{{$x -> id}}">{{$x -> name}}</option>
                        @endforeach
                        </select>
                    </div>
                <div class="form-group">
                   <label for="activity">Activity:</label>
                        <select class="form-control" id="edit_curriculumid" name="edit_curriculumid">
                        @foreach($curriculum as $x)
                        <option value="{{$x -> id}}">{{$x -> name}}</option>
                        @endforeach
                        </select>
                    </div>
              <div class="form-group">
                  <label for="team">Team:</label>
                <textarea class="form-control" rows="5" id="edit_team" name="edit_team"></textarea>
                </div>
              <div class="form-group">
                  <label for="description">Description:</label>
                <textarea class="form-control" rows="5" id="edit_description" name="edit_description"></textarea>
                </div>
              <div class="form-group">
                  <label for="success">Achievements:</label>
                <textarea class="form-control" rows="5" id="edit_achievements" name="edit_achievements"></textarea>
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
    <!-- Edit code ends -->
 
    </div>
	
    </div>
</div>
    </div></div>
 
    </div>
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
          $("#view_classid").text(result.classid);
          $("#view_curriculumid").text(result.curriculumid);
          $("#view_team").text(result.team);
          $("#view_description").text(result.description);
          $("#view_achievements").text(result.achievements);
          $("#view_comments").text(result.comments);
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
          $("#edit_curriculumid").val(result.curriculumid);
          $("#edit_team").val(result.team);
          $("#edit_description").val(result.description);
          $("#edit_achievements").val(result.achievements);
          $("#edit_comments").val(result.comments);
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
