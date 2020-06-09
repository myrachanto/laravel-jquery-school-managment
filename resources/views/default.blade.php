<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="responsive ecommerce web application templates" />
	<title>responsive ecommerce web application templates</title>
   	<link rel="stylesheet" type="text/css" href="{{asset('css/bootstrap.min.css')}}"/> 
 	<link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.min.css')}}"/> 
 	<link rel="stylesheet" type="text/css" href="{{asset('css/caro1.css')}}"/> 
 	<link rel="stylesheet" type="text/css" href="{{asset('css/caro3.css')}}"/>
 	<link rel="stylesheet" type="text/css" href="{{asset('css/calender.css')}}"/>
 	<link rel="stylesheet" type="text/css" href="{{asset('css/dashboard.css')}}"/>  
 	<script type="text/javascript" src="{{asset('js/jquery-1.11.1.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/caro.js')}}"></script>
     <style>
body {
      background-image: url("img/interior/interior3.jpg");
      background-repeat: no-repeat;
      font: 400 15px Lato, "Palatino Linotype", "Book Antiqua", Palatino, serif;
      line-height: 1.8;
      background-attachment: fixed;
   /* background: rgba(46, 139, 87, 0.7) /* seaGreen background with 30% opacity */  
    }
  h2 {
      font-size: 24px;
      text-transform: uppercase;
      color: black;
      font-weight: 600;
      margin-bottom: 10px;
  }
  h4 {
      font-size: 19px;
      line-height: 1.375em;
      color: #87ceeb;
      font-weight: 400;
      margin-bottom: 10px;
  }  
.navbar {
    margin-top: 40px;
    margin-bottom: 100px;
    background-color:  #ff66ff;
    z-index: 9999;
    border: 0;
    font-size: 12px !important;
    line-height: 1.42857143 !important;
    letter-spacing: 2px;
	border-radius: 2;
    float:left;
    
}
.logo {
      color: black;
      font-size: 500px;
      float: left;

  }
.navbar li a, .navbar .navbar-brand {
    color: black !important;
}

.navbar-nav li a:hover, .navbar-nav li.active a {
    color: #ff9933 !important;
    background-color: #006400 !important;
}

.navbar-default .navbar-toggle {
    border-color: transparent;
    color: #2E8B57 !important;
}
.btn {
    margin: 15px 0;
    background-color: #ff66ff;
    color: #2E8B57;
}
.btnab {
    background-color: white;
    
}

.btn:hover {
    border: 1px solid #f4511e;
    background-color: #20B2AA !important;
    color: #F8F8FF;
}
.carousel-control.right, .carousel-control.left {
      background-image: none;
      color: #30C;
  }
  .carousel-indicators li {
      border-color: #30C;
  }
  .carousel-indicators li.active {
      background-color: #30C;
  }
.specialh{
    font-family: 'Sofia';
}
.carodiv {
  background:   rgb(255, 217, 102);
   color:black;
}
.carodiv2 {
    background: rgba(248, 248, 255, 0.9);

}
.carodiv3 {
    background: rgba(220, 220, 220, 0.9)/*gainsboro*/

}
.alterdiv1 {
    background:rgba(255, 255, 240, 0.9);
}
.alterdiv2 {
    background:rgba(248, 248, 255, 0.9);
}
.imgstyle:hover {
    box-shadow: 5px 0px 40px rgba(65, 105, 225, 0.5);
}
input[type=text] {
    
    box-sizing: border-box;
    border: 2px solid #ccc;
    background-color: white;
    background-image: url('searchicon.png');
    background-position: 10px 10px; 
    background-repeat: no-repeat;
    padding: 6px 10px 6px 20px;
    -webkit-transition: width 0.4s ease-in-out;
    transition: width 0.4s ease-in-out;
}

input[type=text]:focus {
    width: 100%;
}
.nav-top {
  width: 100%;
  height: 40px;
  background:  rgb(255, 217, 102);
  color: black;
  text-transform: uppercase;
  text-align: left;
  position: fixed;
  overflow: hidden;
}
.nav-top a { color: black; }
.nav-top a:hover { text-decoration: underline; }
.nav-top div.row { padding: 10px 0; }
.navbar-fixed-top { transition: all 3s ease; }
ul.share-buttons{
  list-style: none;
  padding: 0;
}

ul.share-buttons li{
  display: inline;
}

ul.share-buttons .sr-only {
  position: absolute;
  clip: rect(1px 1px 1px 1px);
  clip: rect(1px, 1px, 1px, 1px);
  padding: 0;
  border: 0;
  height: 1px;
  width: 1px;
  overflow: hidden;
}

ul.share-buttons img{
  width: 32px;
}
.logo {
      color: white;
      float: left !important;

  }
.forms{
    color:white;
}
.btnada{
    color:green !important;
}
.syd{
      width: 100%;
  height: 40px;
  background: #1e90ff;
  color: white;
  text-align: left;
}
.nav-bottom{
    
  background:  rgb(255, 217, 102);
  color: black;
}
    </style>
</head>
<div class="nav-top  navbar-fixed-top">
  <div class="container-fluid">
   <div class="row">
     <div class="col-xs-12">
      <a href="#" >Chantos E-school system|+254729308456|info@chantosweb.com</a>
     </div>
   </div>
 </div>
</div>
<nav class="navbar navbar-fixed-top">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle btnab" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                     
  
      </button>
      <a class="navbar-brand" href="#">Chantos E-school</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><img src="{{asset('img/special/email.gif')}}" alt="messages" width="15" height="15">messages<span class="badge">5</span></a></li>
      
                    @if (auth()->guard('teacher')->user())
              <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#"><img src="{{asset('img/special/user.gif')}}"
         alt="user" width="15" height="15">{{auth()->guard('teacher')->user()->username}}
        <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                    <li><a href="{{url('/member/messages')}}">Nortification</a></li>
                                    <li><a href="{{url('/member/profile')}}">Profile</a></li>
                                <li><a href="{{ url('/teacher-logout') }}">logout</a></li>
                            </ul></li> 
                        @endif
        </ul>
        </div>
</nav><br /><br /><br /><br />

<div id="about" class="container-fluid carodiv1">
<table class="table">
      <tr>
       <td class="col-sm-2 sydmenu">
      <table class="table sydmenu">
      <tr>
      <td><a href="{{url('/admin/dashboard')}}"><div><img src="{{asset('img/comment.png')}}" alt="Dashboard" width="20" height="20">Dashboard</div></a></td></tr><tr>
      <td><a href="{{url('/admin/students')}}"><div><img src="{{asset('img/customers.jpg')}}" alt="inventory" width="20" height="20">Students</div></a></td></tr><tr>
      <td><a href="{{url('/admin/teachers')}}"><div><img src="{{asset('img/index.jpg')}}" alt="customers" width="20" height="20">Teachers</div></a></td></tr><tr>
      <td><a href="{{url('/admin/classe')}}"><div><img src="{{asset('img/repor.jpg')}}" alt="supplier" width="20" height="20">Classes</div></a></td></tr><tr>
      <td><a href="{{url('/admin/subjects')}}"><div><img src="{{asset('img/repor.jpg')}}" alt="accounts" width="20" height="20">Subjects</div></a></td></tr><tr>
      <td><a href="{{url('/admin/exams')}}"><div><img src="{{asset('img/imag3.jpg')}}" alt="administration" width="20" height="20">Exams</div></a></td></tr><tr>
      <td><a href="{{url('/admin/sport')}}"><div><img src="{{asset('img/images/sport.png')}}" alt="reports" width="20" height="20">Sports</div></a></td></tr><tr>
      <td><a href="{{url('/admin/finance')}}"><div><img src="{{asset('img/images.jpg')}}" alt="reports" width="20" height="20">Finances</div></a></td>
      </tr>
      </table></td>
      <td class="col-sm-10">
   @if (Session::has('message'))
                    <p class="alert">{{ Session::get('message') }}</p>
                @endif
</div>
	@yield('content')
    </td></tr></table>
    </div>
<div class="nav-bottom  navbar-fixed-bottom"> 
            <div class="row">
              <div class="col-lg-12" align="left">
  <h5>@myrachanto|<a href="http://www.chantosweb.com">Chantosweb Developers</a>| Chantos School mgnt System</h5>
           </div></div></div>
           
</body>
</html>
