	@extends('default')
@section('header1')
    <meta name="description" content="erp" />
	<title>chantosweb erp</title>
    
@endsection

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                            
                             <div class="col-lg-12">
		@if($errors->has())
		<div id="form-errors">
			<p>The following errors have occurred:</p>

			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><!-- end form-errors -->
		@endif</div>
                             <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading">	<h3>Create New Account</h3>
</div> 
        <div class="panel-body"> <form action="{{ url('/create') }}" method="post">
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
             <div class="form-group">
                  <label for="firstname">First Name:</label>
                  <input type="text" class="form-control" id="fname" name="fname">
                </div>   <div class="form-group">
                  <label for="lastname">Last name:</label>
                  <input type="text" class="form-control" id="lname" name="lname">
                </div>     <div class="form-group">
                  <label for="username">Username:</label>
                  <input type="text" class="form-control" id="username" name="username">
                </div>     <div class="form-group">
                  <label for="country">Country:</label>
                  <input type="text" class="form-control" id="country" name="country">
                </div>      <div class="form-group">
                  <label for="phone">Phone:</label>
                  <input type="text" class="form-control" id="phone" name="phone">
                </div>   
                <div class="form-group">
                  <label for="email">Email:</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>  <div class="form-group">
                  <label for="password">Password:</label>
                  <input type="password" class="form-control" id="password" name="password">
                </div>
                 <div class="form-group">
                  <label for="password_confirmation">Confirm Password:</label>
                  <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
    </div>
                    
    </div>
    </div>         <div class="col-lg-6">
<div class="form-group">
                  <label for="spousename">Spouse Name:</label>
                  <input type="text" class="form-control" id="spousename" name="spousename">
                </div>   <div class="form-group">
                  <label for="nextofkinname">Next of kin name:</label>
                  <input type="text" class="form-control" id="nextofkinname" name="nextofkinname">
                </div>     <div class="form-group">
                  <label for="primary_p_no">Primary number:</label>
                  <input type="text" class="form-control" id="primary_p_no" name="primary_p_no">
                </div>       <div class="form-group">
                  <label for="secondary_p_no">Secondary number:</label>
                  <input type="text" class="form-control" id="secondary_p_no" name="secondary_p_no">
                </div>       <div class="form-group">
                  <label for="county">county:</label>
                  <input type="text" class="form-control" id="county" name="county">
                </div>      <div class="form-group">
                  <label for="p_employment">Previous employment:</label>
                  <input type="text" class="form-control" id="p_employment" name="p_employment">
                </div>         <div class="form-group">
                  <label for="subject1">Subject one:</label>
                  <input type="text" class="form-control" id="subject1" name="subject1">
                </div>           <div class="form-group">
                  <label for="subject2">Subject two:</label>
                  <input type="text" class="form-control" id="subject2" name="subject2">
                </div>             <div class="form-group">
                  <label for="extra_curruclum">Extra curriculum activities:</label>
                  <input type="text" class="form-control" id="extra_curruclum" name="extra_curruclum">
                </div>  
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <button type="submit" class="btn btn-default">Submit</button>
            </form>
    </div>
</div>
@endsection