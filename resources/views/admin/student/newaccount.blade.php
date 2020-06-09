	@extends('default')
@section('header1')
    <meta name="description" content="erp" />
	<title>chantosweb erp</title>
    
@endsection

@section('content')

<div id="about" class="container-fluid carodiv2">
                            <div class="row">
                            
                             <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading">	<h3>Create New Account</h3>

		@if($errors->has())
		<div id="form-errors" class="errors">
			<p>The following errors have occurred:</p>

			<ul>
				@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
				@endforeach
			</ul>
		</div><!-- end form-errors -->
		@endif</div> 
        <div class="panel-body"> <form action="{{ url('/student/create') }}" method="POST">
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
    </div></div></div>
     <div class="col-lg-6">
      <div class="panel panel-default">
     <div class="panel-heading">	<h3>more info</h3>
            
             <div class="form-group">
                  <label for="fathersname">Fathers name:</label>
                  <input type="text" class="form-control" id="fathersname" name="fathersname">
                </div>   <div class="form-group">
                  <label for="mothersname">Mothers name:</label>
                  <input type="text" class="form-control" id="mothersname" name="mothersname">
                </div>     <div class="form-group">
                  <label for="gaurdiansname">Gaurdians name:</label>
                  <input type="text" class="form-control" id="gaurdiansname" name="gaurdiansname">
                </div>     <div class="form-group">
                  <label for="primaryschool">Primary school:</label>
                  <input type="text" class="form-control" id="primaryschool" name="primaryschool">
                </div> <div class="form-group">
                  <label for="kcpescore">Kcpe score:</label>
                  <input type="text" class="form-control" id="kcpescore" name="kcpescore">
                </div>      <div class="form-group">
                  <label for="county">County:</label>
                  <input type="text" class="form-control" id="county" name="county">
                </div>   
                <div class="form-group">
                  <label for="primary_p_no">Primary Phone number:</label>
                  <input type="text" class="form-control" id="primary_p_no" name="primary_p_no">
                </div>  <div class="form-group">
                  <label for="secondary_p_no">Secondary Phone number:</label>
                  <input type="text" class="form-control" id="secondary_p_no" name="secondary_p_no">
                </div>
              <button type="submit" class="btn btn-default">submit</button>
            </form>
    </div></div></div>
    </div>
</div>
@endsection