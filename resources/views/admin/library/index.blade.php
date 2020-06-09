@extends('default')

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                           <div class="col-lg-4">
      <div class="panel panel-default">
     <div class="panel-heading">Upload a book into the library</div> 
        <div class="panel-body">
            <form action="{{ url('/admin/library/upload') }}" method="post" enctype="multipart/form-data" >
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
        <div class="form-group">
                  <label for="name"> Name:</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div> 
        <div class="form-group">
                    <label for="clas">Class:</label>
                    <select class="form-control" id="class" name="class">
                      <option value="one">Form one</option>
                      <option value="two">Form two</option>
                      <option value="three">Form three</option>
                      <option value="four">Form four</option>
                    </select>
                  </div>
        <div class="form-group">
                    <label for="category">Subject:</label>
                    <select class="form-control" id="subject" name="subject">
                      @foreach($subject as $y)
                      <option value="{{$y -> name}}">{{$y -> name}}</option>
                      @endforeach
                    </select>
                  </div>
                  
        <div class="form-group">
                    <label for="category">Category:</label>
                    <select class="form-control" id="category" name="category">
                      <option value="study">Study materials</option>
                      <option value="revision">Revision Materials</option>
                      <option value="other">Other</option>
                    </select>
                  </div>
              <div class="form-group">
                  <label for="description">Description:</label>
                <textarea class="form-control" rows="5" id="description" name="description"></textarea>
                </div>
                 <div class="form-group">
                  <label for="foto">book:</label>
                  <input type="file" class="form-control" id="file" name="file">
                  <input type="submit" value="Upload" name="submit">
                </div>
                </form>
    </div>
        </div></div>
                             <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading">
					  <h4>Library pannel</h4>
    @if ($message = Session::get('success'))
      <div class="alert alert-success alert-block">
        <button type="button" class="close" data-dismiss="alert">×</button>
        <strong>{{ $message }}</strong>
      </div>
    @endif
        <div class="panel-body"> <table class="table table-bordered">
      <thead>
        <tr>
          <th></th>
          <th>Name</th>
          <th>Description</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>

    @foreach($library as $x)
        <tr>
          <td></td>
          <td>{{$x -> name}}</td>
          <td>{{$x -> description}}</td>
          <td>
              <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$x -> id}}')">View</button>
          </td>
        </tr>
       @endforeach
      </tbody>
    </table>
    <input type="hidden" name="hidden_view" id="hidden_view" value="{{url('/admin/library/view')}}">
    

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
          <img src="foto" class="imgstyle" width="50" height="50" alt="{{$x->name}}" />
            <p><b>Name : </b><span id="view_name" class="text-success"></span></p>
            <p><b>Class : </b><span id="view_class" class="text-success"></span></p>
            <p><b>subject : </b><span id="view_subject" class="text-success"></span></p>
            <p><b>category : </b><span id="view_category" class="text-success"></span></p>
            <p><b>Description : </b><span id="view_description" class="text-success"></span></p>
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
          $("#view_name").text(result.name);
          $("#view_class").text(result.class);
          $("#view_subject").text(result.subject);
          $("#view_category").text(result.category);
          $("#view_description").text(result.description);
          var foto = $("#view_foto").val(result.foto);
        }
      });
    }
 
 
</script>
@endsection
