@extends('default')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                             <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>Expenceflows pannel</h4>
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
          <th>amount</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($expenceflows as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> expenceid}}</td>
          <td>{{$x -> amount}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$x -> id}}')">Edit</button>
              
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/expenceflows/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/admin/expenceflows/delete')}}">
    
    <!-- Add Modal start -->
    <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
            
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Add A new expence</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/admin/expenceflows') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                   <label for="acedemicyear">Expence:</label>
                        <select class="form-control" id="expencename" name="expencename">
                        @foreach($expence as $x)
                        <option value="{{$x -> name}}">{{$x -> name}}</option>
                        @endforeach
                        </select>
                    </div>  <div class="form-group">
                    <label for="term">Year :</label>
                    <select class="form-control" id="year" name="year">
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                       </select>
                    </div>
                 <div class="form-group">
                    <label for="term">Term :</label>
                    <select class="form-control" id="term" name="term">
                      <option value="1">Term One</option>
                      <option value="2">Term two</option>
                      <option value="3">Term Three</option>
                       </select>
                    </div>
                 <div class="form-group">
                    <label for="yos">Year Of Study :</label>
                    <select class="form-control" id="yos" name="yos">
                      <option value="one">Form one</option>
                      <option value="two">Form two</option>
                      <option value="three">Form three</option>
                      <option value="four">Form four</option>
                       </select>
                    </div>
            <div class="form-group">
                  <label for="name"> Amount:</label>
                  <input type="text" class="form-control" id="amount" name="amount">
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
            <h4 class="modal-title">View expence</h4>
          </div>
          <div class="modal-body">
            <p><b>Expence : </b><span id="view_expencename" class="text-success"></span></p>
            <p><b>Year : </b><span id="view_year" class="text-success"></span></p>
            <p><b>Term : </b><span id="view_term" class="text-success"></span></p>
            <p><b>Year of study : </b><span id="view_yos" class="text-success"></span></p>
            <p><b>Amount : </b><span id="view_amount" class="text-success"></span></p>
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
            <form action="{{ url('/admin/expenceflows/update') }}" method="post">
            
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                 <div class="form-group">
                   <label for="acedemicyear">Expence:</label>
                        <select class="form-control" id="expencename" name="edit_expencename">
                        @foreach($expence as $x)
                        <option value="{{$x -> name}}">{{$x -> name}}</option>
                        @endforeach
                        </select>
                    </div>  <div class="form-group">
                    <label for="term">Year :</label>
                    <select class="form-control" id="edit_year" name="edit_year">
                      <option value="2015">2015</option>
                      <option value="2016">2016</option>
                      <option value="2017">2017</option>
                      <option value="2018">2018</option>
                      <option value="2019">2019</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                      <option value="2023">2023</option>
                      <option value="2024">2024</option>
                      <option value="2025">2025</option>
                       </select>
                    </div>
                 <div class="form-group">
                    <label for="term">Term :</label>
                    <select class="form-control" id="edit_term" name="edit_term">
                      <option value="1">Term One</option>
                      <option value="2">Term two</option>
                      <option value="3">Term Three</option>
                       </select>
                    </div>
                    
                 <div class="form-group">
                    <label for="yos">Year Of Study :</label>
                    <select class="form-control" id="edit_yos" name="edit_yos">
                      <option value="one">Form one</option>
                      <option value="two">Form two</option>
                      <option value="three">Form three</option>
                      <option value="four">Form four</option>
                       </select>
                    </div>
            <div class="form-group">
                  <label for="name"> Amount:</label>
                  <input type="text" class="form-control" id="edit_amount" name="edit_amount">
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
          $("#view_expenceid").text(result.expenceid);
          $("#view_expencename").text(result.expencename);
          $("#view_year").text(result.year);
          $("#view_term").text(result.term);
          $("#view_amount").text(result.amount);
          $("#view_yos").text(result.yos);
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
          $("#edit_expenceid").val(result.expenceid);
          $("#edit_expencename").val(result.expencename);
          $("#edit_year").val(result.year);
          $("#edit_term").val(result.term);
          $("#edit_amount").val(result.amount);
          $("#edit_yos").val(result.yos);
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
