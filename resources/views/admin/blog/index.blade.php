@extends('default')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                          <div class="col-lg-4">
      <div class="panel panel-default">
     <div class="panel-heading">Upload the Blog photo</div> 
            <div class="panel-body">
        <div class="form-group">
                    <label for="category">Blog:</label>
                    <select class="form-control" id="blogid" name="blogid">
                      @foreach($blog as $y)
                      <option value="{{$y -> id}}">{{$y -> title}}</option>
                      @endforeach
                    </select>
                  </div>
                  @if($blog -> count()>=1 )
                   <div class="form-group">
                  <label for="foto">Blog photo:</label>
                  <input type="file" class="form-control" id="file" name="file">
                  <input type="submit" value="Upload" name="submit">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div></form>

               @endif</div></div></div>
                             <div class="col-lg-8">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>blog pannel</h4>
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
          <th>Name</th>
          <th>title</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($blog as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> name}}</td>
          <td>{{$x -> title}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
              <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Delete</button>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/blog/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/admin/blog/delete')}}">
    
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
            <form action="{{ url('/admin/blog') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            <div class="form-group">
                  <label for="name"> Name:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div> 
                <div class="form-group">
                  <label for="title"> Title:</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div> 
                <div class="form-group">
                  <label for="metatag"> Metatag:</label>
                  <input type="text" class="form-control" id="metatag" name="metatag">
                </div>  
                <div class="form-group">
                  <label for="category"> Category:</label>
                  <input type="text" class="form-control" id="category" name="category">
                </div> 
              <div class="form-group">
                     <div class="form-group">
                  <label for="description1">Description part one:</label>
                <textarea class="form-control" rows="5" id="description1" name="description1"></textarea>
                </div>
                 
              <div class="form-group">
                     <div class="form-group">
                  <label for="description2">Description part two:</label>
                <textarea class="form-control" rows="5" id="description2" name="description2"></textarea>
                </div>  
              <div class="form-group">
                     <div class="form-group">
                  <label for="description3">Description part three:</label>
                <textarea class="form-control" rows="5" id="description3" name="description3"></textarea>
                </div>  
              <div class="form-group">
                     <div class="form-group">
                  <label for="summary">Summary:</label>
                <textarea class="form-control" rows="5" id="summary" name="summary"></textarea>
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
            <p><b>Name : </b><span id="view_name" class="text-success"></span></p>
            <p><b>Title : </b><span id="view_title" class="text-success"></span></p>
            <p><b>Metatag : </b><span id="view_metatag" class="text-success"></span></p>
            <p><b>Category : </b><span id="view_category" class="text-success"></span></p>
            <p><b>Description part one: </b><span id="view_description1" class="text-success"></span></p>
            <p><b>Description part two: </b><span id="view_description2" class="text-success"></span></p>
            <p><b>Description part three: </b><span id="view_description3" class="text-success"></span></p>
            <p><b>summary : </b><span id="view_summary" class="text-success"></span></p>
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
            <form action="{{ url('/admin/blog/update') }}" method="post">
            
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
             
                <div class="form-group">
                  <label for="edit_name">Name:</label>
                  <input type="text" class="form-control" id="edit_name" name="edit_name">
                </div>  
                 <div class="form-group">
                  <label for="edit_title">Title:</label>
                  <input type="text" class="form-control" id="edit_title" name="edit_title">
                </div>  
                 <div class="form-group">
                  <label for="edit_metatag">Meta tag:</label>
                  <input type="text" class="form-control" id="edit_metatag" name="edit_metatag">
                </div>  
                 <div class="form-group">
                  <label for="edit_category">Category:</label>
                  <input type="text" class="form-control" id="edit_category" name="edit_category">
                </div>  
                <div class="form-group">
                <label for="edit_description">Description part one:</label>
                <textarea class="form-control" rows="5" id="edit_description1" name="edit_description1"></textarea>
              </div>
                 
                <div class="form-group">
                <label for="edit_description">Description part two:</label>
                <textarea class="form-control" rows="5" id="edit_description2" name="edit_description2"></textarea>
              </div> 
                <div class="form-group">
                <label for="edit_description">Description part three:</label>
                <textarea class="form-control" rows="5" id="edit_description3" name="edit_description3"></textarea>
              </div> 
                <div class="form-group">
                <label for="edit_description">Summary:</label>
                <textarea class="form-control" rows="5" id="edit_summary" name="edit_summary"></textarea>
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
          $("#view_name").text(result.name);
          $("#view_title").text(result.title);
          $("#view_metatag").text(result.metatag);
          $("#view_category").text(result.category);
          $("#view_description1").text(result.description1);
          $("#view_description2").text(result.description2);
          $("#view_description3").text(result.description3);
          $("#view_summary").text(result.summary);
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
          $("#edit_name").val(result.name);
          $("#edit_title").val(result.title);
          $("#edit_metatag").val(result.metatag);
          $("#edit_category").val(result.category);
          $("#edit_description1").val(result.description1);
          $("#edit_description2").val(result.description2);
          $("#edit_description3").val(result.description3);
          $("#edit_summary").val(result.summary);
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
