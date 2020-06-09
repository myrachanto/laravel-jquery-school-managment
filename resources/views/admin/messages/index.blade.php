@extends('default')

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                           <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading">Inbox</div> 
        <div class="panel-body">
         <table class="table table-bordered">
      <thead>
        <tr>
          <th>Sender</th>
          <th>Title</th>
          <th>Body</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
      @if($inbox -> count()>=1 )
                @foreach($inbox as $x)
                    <tr>
                    <td>{{$x -> senderid}}</td>
                    <td>{{$x -> title}}</td>
                    <td>{{$x -> body}}</td>
                    <td>
                        <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
                        <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Delete</button>
                    </td>
                    </tr>
                @endforeach
       @else
           <tr>
          <td colspan="4"><h3> you have no messages!!!</h3></td>
        </tr>
       @endif
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/messages/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/admin/messages/delete')}}">
   
                </div>
    </div></div>  
           <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading">Outbox</div> 
        <div class="panel-body">
        <button type="button" class="btn btn-info btn-sm pull-right" data-toggle="modal" data-target="#addModal">New message</button></div> 
        <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th>Receiver</th>
          <th>Title</th>
          <th>Body</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

      @if($outbox -> count()>=1 )
    @foreach($outbox as $x)
        <tr>
          <td>{{$x -> senderid}}</td>
          <td>{{$x -> title}}</td>
          <td>{{$x -> body}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
             <button class="btn btn-danger" onclick="fun_delete('{{$x -> id}}')">Delete</button>
          </td>
        </tr>
       @endforeach
       @else
           <tr>
          <td colspan="4"><h3> you have no messages!!!</h3></td>
        </tr>
       
       @endif
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/messages/view')}}">
    <input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('/admin/messages/delete')}}">
     <div class="modal fade" id="addModal" role="dialog">
      <div class="modal-dialog">
            
        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">New message</h4>
          </div>
          <div class="modal-body">
            <form action="{{ url('/admin/messages') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="form-group">
                   <label for="receiverid">Receipient:</label>
                        <select class="form-control" id="receiverid" name="receiverid">
                        @foreach($users as $y)
                        <option value="{{$y -> id}}">{{$y -> username}}</option>
                        @endforeach
                        </select>
                    </div>       <div class="form-group">
                   <label for="receiverid">Message type:</label>
                        <select class="form-control" id="type" name="type">
                        <option value="privatemsg">privatemsg</option>
                        <option value="general">general</option>
                        
                        </select>
                    </div>
            <div class="form-group">
                  <label for="name"> title:</label>
                  <input type="text" class="form-control" id="title" name="title">
                </div>  
              <div class="form-group">
                     <div class="form-group">
                  <label for="description">Message:</label>
                <textarea class="form-control" rows="5" id="body" name="body"></textarea>
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
            <h4 class="modal-title">View Message</h4>
          </div>
          <div class="modal-body">
            <p><b>From : </b><span id="view_senderid" class="text-success"></span></p>
            <p><b>To : </b><span id="view_receiverid" class="text-success"></span></p>
            <p><b>Title : </b><span id="view_title" class="text-success"></span></p>
            <p><b>Message : </b><span id="view_body" class="text-success"></span></p>
           </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
        
      </div>
      </div>
    </div>
    <!-- view modal ends -->
    </div></div></div></div></div>
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
          $("#view_senderid").text(result.senderid);
          $("#view_receiverid").text(result.receiverid);
          $("#view_title").text(result.title);
          $("#view_body").text(result.body);
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
