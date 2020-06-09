@extends('default')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
             
                             <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>Expulsion list pannel</h4>
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
          <th>Username</th>
          <th>Regno</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($warn as $x)
        <tr>
          <td>{{$x -> id}}</td>
          <td>{{$x -> username}}</td>
          <td>{{$x -> regno}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/yos/expulsionlsit/view')}}">
    
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
            <p><b>Username : </b><span id="view_username" class="text-success"></span></p>
            <p><b>Registration number : </b><span id="view_regno" class="text-success"></span></p>
            <p><b>Phone number : </b><span id="view_phoneno" class="text-success"></span></p>
            <p><b>Warning : </b><span id="view_warning" class="text-success"></span></p>
            <p><b>Grounds : </b><span id="view_ground" class="text-success"></span></p>
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
          $("#view_username").text(result.username);
          $("#view_regno").text(result.regno);
          $("#view_phoneno").text(result.phoneno);
          $("#view_warning").text(result.warning);
          $("#view_ground").text(result.ground);
        }
      });
    }

</script>
@endsection
