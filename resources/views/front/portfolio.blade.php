@extends('welcome')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
    
@endsection

@section('content')

<!-- Container (Portfolio Section) -->
<div  class="container-fluid text-center alterdiv2">
  <h1>Portfolio</h1><br>
  </div>
<div class="container-fluid text-center carodiv2">
     <div class="col-sm-4">
      <div class="thumbnail">
      <img src="{{asset('img/images/foto4.jpg')}}" class="img-responsive imgstyle" alt="privine" />
        <p><strong>Websites</strong></p>
        <p>As far as e commerce is concerned seo, efficiency, effectiveness are the keys to successful online business venture. Thus our e commerce sites are linked to social sites so as to enable interactive relations which in the long run vastly optimizes the search of the site.</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
      <img src="{{asset('img/images/foto3.jpg')}}" class="img-responsive imgstyle" alt="privine" />
        <p><strong>Content management system</strong></p>
        <p>Our websites are built to bring control to our clients even with little or no programming skills. One, with the use of content management software(c.m.s) one can customize their websites towards their tastes and preferences.</p>
      </div>
    </div>
    <div class="col-sm-4">
      <div class="thumbnail">
      <img src="{{asset('img/images/foto2.jpg')}}" class="img-responsive imgstyle" alt="privine" />
        <p><strong>Web applications</strong></p>
        <p>Our e commerce sites examples include catering websites, online shopping website with a cart, online ticket reservation website, doctors appointment reservation website equipped with an E.R.P and much more.</p>
      </div>
    </div>
    </div>
@endsection