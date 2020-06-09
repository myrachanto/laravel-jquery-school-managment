@extends('welcome')

@section('content')
                            
<div id="about" class="container-fluid carodiv2">
                            <div class="row"><div class="col-lg-8">
      <div class="panel panel-default">
     <div class="panel-heading"><h2>Find the exam results</2></div> 
        <div class="panel-body">
 <form action="{{ url('/member/results')}}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="form-group">
                   <label for="acedemicyear">Exam:</label>
                        <select class="form-control" id="exam" name="exam">
                        @foreach($exam as $y)
                        <option value="{{$y -> id}}">{{$y -> name}}</option>
                        @endforeach
                        </select>
                    </div>
              <button type="submit" class="btn btn-default">Get the results</button>
            </form>

             </div> </div> </div> 
             
             </div> </div> 
@endsection