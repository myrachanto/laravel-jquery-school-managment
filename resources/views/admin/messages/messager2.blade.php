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
     <div class="panel-heading"><h2>Send the message to year {{$yos}} Parents/Students </h2>
     </div> 
        <div class="panel-body"> 
        <form action="{{ url('/admin/messages/send') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <table class="table table-bordered">
      <thead><tr>
          <th>Title</th>
          <th><i>{{$title}}</i></th>
          <th>Message</th>
          <th colspan="3"><i>{{$message}}</i></th>
        </tr>
        <tr>
          <th>Name</th>
          <th>Regno</th>
          <th>Acedemic year</th>
          <th>Year of study</th>
          <th>email</th>
          <th><input type="checkbox" id="select_all" name="checked[]">Check All </th>
        </tr>
      </thead>
      <tbody>

    @foreach($receivers as $x)
        <tr>
          <td>{{$x -> username}}</td>
          <td>{{$x -> regno}}</td>
          <td>{{$x -> academicyear}}</td>
          <td>{{$x -> yos}}</td>
          <td>{{$x -> email}}</td>
          <td>          
            <input type="hidden" id="name" value="{{$x -> id}}" name="studentid[]">
          <input type="checkbox" id="checked" class="checkbox" name="checked[]"></td>
        </tr>
       @endforeach
      </tbody>
      <tr><td colspan="6" align="right">
            <input type="hidden" id="yos" value="{{$yos}}" name="yos">
            <input type="hidden" id="title" value="{{$title}}" name="title">
            <input type="hidden" id="message" value="{{$message}}" name="message">
              <button type="submit" class="btn btn-default">Send</button></td></tr>
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