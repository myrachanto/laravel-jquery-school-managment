@extends('default')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                              <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Promote Year {{$yos}} To the Next level</h2>
     </div> 
        <div class="panel-body"> 
        <form action="{{ url('/admin/yos/promote') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Regno</th>
          <th>Acedemic year</th>
          <th>Year of study</th>
          <th><input type="checkbox" id="select_all" name="checked[]">Check All </th>
        </tr>
      </thead>
      <tbody>

    @foreach($promote as $x)
        <tr>
          <td>{{$x -> username}}</td>
          <td>{{$x -> regno}}</td>
          <td>{{$x -> academicyear}}</td>
          <td>          
            <input type="hidden" id="name" value="{{$x -> id}}" name="studentid[]">
          <select class="form-control" id="yos" name="yos[]">
                        @foreach($yo as $x)
                        <option value="{{$x -> name}}">{{$x -> name}}</option>
                        @endforeach
                        </select></td>
          <td><input type="checkbox" id="checked" class="checkbox" name="checked[]"></td>
        </tr>
       @endforeach
      </tbody>
      <tr><td colspan="4" align="right">
              <button type="submit" class="btn btn-default">Promote</button></td></tr>
    </table>               
            </form>
    <!-- add code ends -->
 
             </div> </div> </div> </div> </div>
                                       <script type="text/javascript">
$(document).ready(function(){
    $('#select_all').on('click',function(){
        if(this.checked){
            $('.checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.checkbox').on('click',function(){
        if($('.checkbox:checked').length == $('.checkbox').length){
            $('#select_all').prop('checked',true);
        }else{
            $('#select_all').prop('checked',false);
        }
    });
});
</script>
  @endsection