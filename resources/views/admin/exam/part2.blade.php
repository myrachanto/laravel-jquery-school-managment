@extends('default')

@section('content')
<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                              <div class="col-lg-12">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>{{$subject->name}}</h2>{{$exam->name}} Class-{{$classes->name}}
     </div> 
        <div class="panel-body"> 
        <form action="{{ url('/admin/exam/Information') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
               <table class="table table-bordered">
      <thead>
        <tr>
          <th>Name</th>
          <th>Regno</th>
          <th>Acedemic year</th>
          <th>Exam</th>
          <th><input type="checkbox" id="select_all" name="checked[]">Check All </th>
        </tr>
      </thead>
      <tbody>

    @foreach($student as $x)
        <tr>
          <td>{{$x -> username}}</td>
          <td>{{$x -> regno}}</td>
          <td>{{$x -> academicyear}}</td>
          <td>          
            <input type="hidden" id="name" value="{{$x -> id}}" name="studentid[]">
          <input type="text" class="checkbox" id="score" name="score[]"></td>
          <td><input type="checkbox" id="checked" class="checkbox" name="checked[]"></td>
        </tr>
       @endforeach
      </tbody>
      <tr><td colspan="4" align="right">
               <input type="hidden" id="name" value="{{$subject -> id}}" name="subjectid">
               <input type="hidden" id="name" value="{{$exam -> id}}" name="examid">
               <input type="hidden" id="name" value="{{$classes -> id}}" name="classesid">

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