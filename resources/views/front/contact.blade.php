@extends('welcome')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
    
@endsection

@section('content')

<div id="about" class="container-fluid carodiv">
<div class="container-fluid bg-grey">
  <h2 class="text-center">CONTACT</h2>
  <div class="row">
    <div class="col-sm-4">
    
<form action="{{ url('/contacts') }}" method="post">
      <p>Contact us and we'll get back to you within 24 hours.</p>
      <p><span class="glyphicon glyphicon-map-marker"></span> Nairobi, Kenya</p>
      <p><span class="glyphicon glyphicon-phone"></span> (+254)729308456</p>
      <p><span class="glyphicon glyphicon-envelope"></span> info@chantosweb.com</p> 
    </div>
     <div class="col-sm-8"><h2>Personal Details</h2><hr />
               <input type="hidden" name="_token" value="{{ csrf_token() }}">
 <div class="form-group">
                <label for="fname">First Name:</label>
                <input type="text" class="form-control" id="fname" name="fname">
              </div>
              
 <div class="form-group">
                <label for="lname">last Name:</label>
                <input type="text" class="form-control" id="lname" name="lname">
              </div>
              
 <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email">
              </div>
 <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="text" class="form-control" id="phone" name="phone">
              </div>
              <div class="form-group">
                  <label for="moreinfo">More info that you would like us to know:</label>
                <textarea class="form-control" rows="5" id="moreinfo" name="moreinfo"></textarea>
                </div>
            <button type="submit" class="btn btn-default" data-dismiss="modal">submit</button>
    </div>
  </div>
   </form>
</div>
</diV>
@endsection