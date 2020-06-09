@extends('default')

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading">General messages</div> 
        <div class="panel-body">
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

      @if($messages -> count()>=1 )
    @foreach($messages as $x)
        <tr>
          <td>{{$x -> senderid}}</td>
          <td>{{$x -> title}}</td>
          <td>{{$x -> body}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
           
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
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/general/view')}}">

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
            <p><b>From : </b><span id="view_Senderid" class="text-success"></span></p>
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
        
</script>
@endsection
