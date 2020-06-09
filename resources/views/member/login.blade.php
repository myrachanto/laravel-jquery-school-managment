	@extends('welcome')
@section('header1')
    <meta name="description" content="erp" />
	<title>chantosweb erp</title>
    
@endsection

@section('content')

<div id="about" class="container-fluid carodiv">
                            <div class="row">
<div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading"><h3>signup</h3></div> 
        <div class="panel-body">
        <section id="signin-form">
         <form action="{{ url('/member/login') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
            
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>  <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
               
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
    </section><!-- end signin-form -->
    </div>
    </div></div></div></div>
    

@endsection