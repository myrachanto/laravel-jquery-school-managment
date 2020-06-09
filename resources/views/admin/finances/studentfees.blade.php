@extends('default')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
             
                             <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>Studentfees pannel</h4>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
        <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>UserName</th>
          <th>Regno</th>
          <th>year-term</th>
          <th>amount</th>
          <th>Payment</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($studs as $x)
        <tr>
          <td>{{$x -> username}}</td>
          <td>{{$x -> regno}}</td>
          <td>Year:{{$x -> year}}-{{$x -> term}}</td>
          <td>{{$x -> amount}}</td>
          <td>{{$x -> payment}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
              
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/finances/studentfees/view')}}">
    
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
            <p><b>User Name : </b><span id="view_fname" class="text-success"></span></p>
            <p><b>Registration number: </b><span id="view_lname" class="text-success"></span></p>
            <p><b>Name : </b><span id="view_name" class="text-success"></span></p>
            <p><b>Year : </b><span id="view_year" class="text-success"></span></p>
            <p><b>Term : </b><span id="view_term" class="text-success"></span></p>
            <p><b>Description : </b><span id="view_description" class="text-success"></span></p>
            <p><b>Amount : </b><span id="view_amount" class="text-success"></span></p>
            <p><b>Payment : </b><span id="view_payment" class="text-success"></span></p>
            <p><b>Balance : </b><span id="view_balance" class="text-success"></span></p>
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
          $("#view_name").text(result.name);
          $("#view_year").text(result.year);
          $("#view_term").text(result.term);
          $("#view_description").text(result.description);
          $("#view_amount").text(result.amount);
          $("#view_payment").text(result.payment);
          $("#view_balance").text(result.balance);
        }
      });
    }
</script>
@endsection

