@extends('home')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                             <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>Finaces pannel</h4>
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
          <th>student</th>
          <th>name</th>
          <th>description</th>
          <th>amount</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($finances as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> studentid}}</td>
          <td>{{$x -> name}}</td>
          <td>{{$x -> description}}</td>
          <td>{{$x -> amount}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/Accounts/finances/view')}}">
   
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
            <form action="{{ url('/Accounts/finances') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <div class="form-group">
                   <label for="acedemicyear">Expence:</label>
                        <select class="form-control" id="studentid" name="studentid">
                        @foreach($student as $x)
                        <option value="{{$x -> id}}">{{$x -> username}}->Regno :{{$x -> regno}}</option>
                        @endforeach
                        </select>
                    </div> 
                    <div class="form-group">
                  <label for="name"> Name:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>  
                  <div class="form-group">
                   <label for="acedemicyear">Year of Study:</label>
                        <select class="form-control" id="yos" name="yos">
                        @foreach($yos as $x)
                        <option value="{{$x -> id}}">{{$x -> name}}</option>
                        @endforeach
                        </select>
                    </div> 
                 <div class="form-group">
                    <label for="term">Term :</label>
                    <select class="form-control" id="term" name="term">
                      <option value="term1">Term One</option>
                      <option value="term2">Term two</option>
                      <option value="term3">Term Three</option>
                       </select>
                    </div>
              <div class="form-group">
                     <div class="form-group">
                  <label for="description">Description:</label>
                <textarea class="form-control" rows="5" id="description" name="description"></textarea>
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
            <p><b>Student : </b><span id="view_studentid" class="text-success"></span></p>
            <p><b>Name : </b><span id="view_name" class="text-success"></span></p>
            <p><b>Year : </b><span id="view_year" class="text-success"></span></p>
            <p><b>Term : </b><span id="view_term" class="text-success"></span></p>
            <p><b>Description : </b><span id="view_description" class="text-success"></span></p>
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
          $("#view_studentid").text(result.studentid);
          $("#view_name").text(result.name);
          $("#view_year").text(result.year);
          $("#view_term").text(result.term);
          $("#view_description").text(result.description);
          $("#view_amount").text(result.amount);
        }
      });
    }
 
</script>
@endsection
