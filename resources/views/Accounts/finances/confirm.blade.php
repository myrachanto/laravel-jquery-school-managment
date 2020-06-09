@extends('home')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
  
@endsection

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                              <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Cornfirm if this is the list of {{$year}}</h2>
     </div> 
        <div class="panel-body"> 
        <form action="{{ url('/Accounts/finances/deploy') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <table class="table table-bordered">
      <thead>
        <tr>
          <th>Invoice number</th>
          <th>{{$invoiceno}}</th>
          <th>Year</th>
          <th>{{$year}}</th>
          <th>Term</th>
          <th>{{$term}}</th>
        </tr>
        <tr>
          <th>Name</th>
          <th>Regno</th>
          <th>Acedemic year</th>
          <th>Year of study</th>
          <th>Fee</th>
          <th><input type="checkbox" id="select_all" name="checked[]">Check All </th>
        </tr>
      </thead>
      <tbody>

    @foreach($student as $x)
        <tr>
          <td>{{$x -> username}}</td>
          <td>{{$x -> regno}}</td>
          <td>{{$x -> academicyear}}</td>
          <td>{{$x -> yos}}</td>
          <td>{{$amt}}</td>
          <td>
            <input type="hidden" id="name" value="{{$x -> id}}" name="studentid[]">
          <input type="checkbox" id="checked" class="checkbox" name="checked[]"></td>
        </tr>
       @endforeach
      </tbody>
      <tr><td colspan="6" align="right">
               <input type="hidden" id="amt" value="{{$amt}}" name="amt">
               <input type="hidden" id="invoiceno" value="{{$invoiceno}}" name="invoiceno">
               <input type="hidden" id="term" value="{{$term}}" name="term">
               <input type="hidden" id="year" value="{{$year}}" name="year">
              <button type="submit" class="btn btn-default">Submit</button></td></tr></table>
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