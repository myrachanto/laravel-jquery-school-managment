@extends('default')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                                   <div class="col-lg-8">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>Timetable pannel</h4>
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
          <th>Day</th>
          <th>Class</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($timetable as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> day}}</td>
          <td>{{$x -> class}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
              
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/timetable/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/admin/timetable/delete')}}">
    
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
            
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add A new timetable </h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/admin/timetable') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                    <label for="dia">Day:</label>
                    <select class="form-control" id="dayid" name="dayid">
                     @foreach($teacherclass as $x)
                      <option value="{{$x -> id}}">{{$x -> name}}</option>
                      @endforeach
                    </select> 
                    </div>
                    <div class="form-group">
                    <label for="dia">Class:</label>
                    <select class="form-control" id="classid" name="classid">
                     @foreach($classes as $y)
                      <option value="{{$y -> id}}">{{$y -> name}}</option>
                      @endforeach
                    </select>
                    </div>
               <div class="form-group">
                  <label for="firstname">8:10-8:55:</label> 
                    <select class="form-control" id="first" name="first">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
                    </div> <div class="form-group">
                  <label for="8:55-9:30">8:55-9:30:</label>
                    <select class="form-control"id="second" name="second">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select> </div> <div class="form-group">
                  <label for="9:40-10:35">9:40-10:35:</label>
                
                    <select class="form-control"id="third" name="third">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select> </div> <div class="form-group">
                  <label for="10:30-11:00">10:30-11:00:</label>
                    <select class="form-control"id="fourth" name="fourth">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select> </div>  		    
                    <div class="form-group">
                 <label for="11:20-12:05">11:20-12:05:</label>
                  <select class="form-control"id="firth" name="firth">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select></diV><div class="form-group">
                  <label for="12:05-12:50">12:05-12:50:</label>
                  <select class="form-control"id="sixth" name="sixth">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select></diV><div class="form-group">
                  <label for="gaurdiansname">02:00-02:45:</label>
                 <select class="form-control" id="seventh" name="seventh">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select></diV> <div class="form-group">
                  <label for="primaryschool">02:45-03:30:</label>
                <select class="form-control"id="eighth" name="eighth">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>  </diV>     <div class="form-group">
                  <label for="kcpescore">03:30-04:15:</label>
                  <select class="form-control"id="nineth" name="nineth">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select></diV>
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
            <p><b>Day : </b><span id="view_day" class="text-success"></span></p>
            <p><b>class : </b><span id="view_class" class="text-success"></span></p>
            <p><b>8:10-8:55 : </b><span id="view_first" class="text-success"></span></p>
            <p><b>8:55-9:30 : </b><span id="view_second" class="text-success"></span></p>
            <p><b>9:40-10:35: </b><span id="view_third" class="text-success"></span></p>
            <p><b>10:30-11:00 : </b><span id="view_fourth" class="text-success"></span></p>
            <p><b>11:20-12:05: </b><span id="view_firth" class="text-success"></span></p>
            <p><b>12:05-12:50 : </b><span id="view_sixth" class="text-success"></span></p>
            <p><b>02:00-02:45 : </b><span id="view_seventh" class="text-success"></span></p>
            <p><b>02:45-03:30 : </b><span id="view_eighth" class="text-success"></span></p>
            <p><b>03:30-04:15 : </b><span id="view_nineth" class="text-success"></span></p>
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
            <form action="{{ url('/admin/timetable/update') }}" method="post">
            
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                    <label for="dia">Day:</label>
                    <select class="form-control" id="edit_dayid" name="edit_dayid">
                     @foreach($teacherclass as $x)
                      <option value="{{$x -> id}}">{{$x -> name}}</option>
                      @endforeach
                    </select>
                    </div>
                    <div class="form-group">
                    <label for="dia">Class:</label>
                    <select class="form-control" id="edit_classid" name="edit_classid">
                     @foreach($classes as $y)
                      <option value="{{$y -> id}}">{{$y -> name}}</option>
                      @endforeach
                    </select>
                    </div>
               <div class="form-group">
                  <label for="firstname">8:10-8:55:</label>
              <select class="form-control" id="edit_first" name="edit_first>
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select></div><div class="form-group">
                  <label for="8:55-9:30">8:55-9:30:</label>
               
                <select class="form-control" id="edit_second" name="edit_second">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select></div>     <div class="form-group">
                  <label for="9:40-10:35">9:40-10:35:</label>
                  <select class="form-control" id="edit_third" name="edit_third">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
                </div>     <div class="form-group">
                  <label for="10:30-11:00">10:30-11:00:</label>
                 <select class="form-control" id="edit_fourth" name="edit_fourth">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
                </div>   		    
                    <div class="form-group">
                 <label for="11:20-12:05">11:20-12:05:</label>
                  <select class="form-control" id="edit_firth" name="edit_firth">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
                </div>   <div class="form-group">
                  <label for="12:05-12:50">12:05-12:50:</label>
                  <select class="form-control" id="edit_sixth" name="edit_sixth">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
                </div>      <div class="form-group">
                  <label for="gaurdiansname">02:00-02:45:</label>
                  <select class="form-control" id="edit_seventh" name="edit_seventh">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
                </div>         <div class="form-group">
                  <label for="primaryschool">02:45-03:30:</label>
                  <select class="form-control" id="edit_eighth" name="edit_eighth">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
                </div>             <div class="form-group">
                  <label for="kcpescore">03:30-04:15:</label>
                  <select class="form-control" id="edit_nineth" name="edit_nineth">
                     @foreach($subject as $z)
                      <option value="{{$z -> name}}">{{$z -> name}}</option>
                      @endforeach
                    </select>
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
          $("#view_day").text(result.day);
          $("#view_class").text(result.class);
          $("#view_first").text(result.first);
          $("#view_second").text(result.second);
          $("#view_third").text(result.third);
          $("#view_fourth").text(result.fourth);
          $("#view_firth").text(result.firth);
          $("#view_sixth").text(result.sixth);
          $("#view_seventh").text(result.seventh);
          $("#view_eighth").text(result.eighth);
          $("#view_nineth").text(result.nineth);
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
          $("#edit_dayid").val(result.dayid);
          $("#edit_classid").val(result.classid);
          $("#edit_first").val(result.first);
          $("#edit_second").val(result.second);
          $("#edit_third").val(result.third);
          $("#edit_fourth").val(result.fourth);
          $("#edit_firth").val(result.firth);
          $("#edit_sixth").val(result.sixth);
          $("#edit_seventh").val(result.seventh);
          $("#edit_eighth").val(result.eighth);
          $("#edit_nineth").val(result.nineth);
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
