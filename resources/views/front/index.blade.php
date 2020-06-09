@extends('welcome')
@section('header1')
    <meta name="description" content="Get the best responsive ecommerce website and web application for you business today designed with efficience and integrity" />
	<title>Best responsive ecommerce web application developers in english and espanol</title>
    
@endsection

@section('content')
<div id="bootstrap-touch-slider" class="carousel bs-slider fade  control-round indicators-line" data-ride="carousel" 
  data-pause="hover" data-interval="5000" >

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#bootstrap-touch-slider" data-slide-to="0" class="active"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="1"></li>
                <li data-target="#bootstrap-touch-slider" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper For Slides -->
            <div class="carousel-inner" role="listbox">

                <!-- Third Slide -->
                <div class="item active">

                    <!-- Slide Background -->
                    <img src="{{asset('img/images/foto4.jpg')}}" alt="doctors appointment reservation website with an E.R.P" class="slide-image">
                    <div class="bs-slider-overlay"></div>

                    <div class="container">
                        <div class="row">
                            <!-- Slide Text Layer -->
                            <div class="slide-text slide_style_left">
                                <h1 data-animation="animated zoomInRight">International education</h1>
                                <p data-animation="animated fadeInLeft">Worry no more! Chantos E-school will provide the best Education.</p>
                                <p data-animation="animated fadeInLeft">Email:info@chantosweb.com<br />
                                Password:12345</p>
                               
          <a href="{{url('/aboutus')}}"><button type="button" class="btn btn-default">find out more</button></a>
                             </div>
                        </div>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Second Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="{{asset('img/school/school2.jpg')}}" alt="catering"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_center">
                        <h1 data-animation="animated flipInX">Foreign Languages</h1>
                        <p data-animation="animated lightSpeedIn">Our teachers are internationally qualified</p>
                                <p data-animation="animated fadeInLeft">Email:info@chantosweb.com<br />
                                Password:12345</p>
                       
          <a href="{{url('/contact')}}"><button type="button" class="btn btn-default">Contact us</button></a>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- Third Slide -->
                <div class="item">

                    <!-- Slide Background -->
                    <img src="{{asset('img/school/school3.jpg')}}" alt="make solid memories"  class="slide-image"/>
                    <div class="bs-slider-overlay"></div>
                    <!-- Slide Text Layer -->
                    <div class="slide-text slide_style_right">
                        <h1 data-animation="animated zoomInLeft">Global expossure!!!</h1>
                        <p data-animation="animated fadeInRight">School internship is our code to ensure global expossure</p>
                                <p data-animation="animated fadeInLeft">Email:info@chantosweb.com<br />
                                Password:12345</p>
                        
          <a href="{{url('/contact')}}"><button type="button" class="btn btn-default">find out more</button></a>
                    </div>
                </div>
                <!-- End of Slide -->

                <!-- End of Slide -->

            </div><!-- End of Wrapper For Slides -->

            <!-- Left Control -->
            <a class="left carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>

            <!-- Right Control -->
            <a class="right carousel-control" href="#bootstrap-touch-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>

        </div> <!-- End  bootstrap-touch-slider Slider -->
<div id="about" class="container-fluid carodiv">
    <div class="col-sm-8">
      <h1 class="specialh">Chantos E-School</h1>
     <p> Chantos school management web –based application is designed to embrace and tighten an already loose existing relationship between parents, teacher and kids/students. It has often told that parents are no longer involved in their children’s life and to be honest that has come to be a shock even to caring parents.<br />
Its embarrassing really to realize sometimes you have no idea what the stronghold of your kids in terms of subjects, sports and the like. In today’s world, it’s evident that the future of entrepreneurs is quite remarkable despite what they choose to entrepreneur in for example athletic is quite rewarding nowadays, so is football, or song writer or a dancer and the list goes on and on.<br />
This system keeps the parent updated of the student progress in all aspects of his/her study. It’s quite a remarkable system given that it has multiple authorizations namely <br />
<ol><li>	Teacher/principal portal.</li>
<li>	The accountant department/bursars portal.</li>
<li>	The parent/student portal.</li> </ol>
With the teacher panel, it has being designed to operate with user access levels such that the principal has full control of the system while a regular teacher has access to what is deemed fit for his/her use- like he/she cant access the expulsion list.<br />
The beauty and resourcefulness of the system extends to the fact that it comes with a responsive well designed website for the school. Technology that would otherwise cost the institution more money to put in place in the near future and let’s be honest website as marketing tool that is otherwise attracting more attention in this digital world</p>

      <a href="{{url('/contact')}}"><button type="button" class="btn btn-default">find out more</button></a>
    </div>
    <div class="col-sm-4 "><br />
      <img src="{{asset('img/images/foto4.jpg')}}" class="img-responsive imgstyle" alt="privine" />
    </div>
  
</div>


<div class="container-fluid alterdiv1">  
  <h2>SERVICES</h2>
  <h4>What we offer</h4>
  <br>
  <div class="row">
    <div class="col-sm-4">
    <img src="{{asset('img/images/computer.png')}}" width="100" alt="auditing" />
      <h4>Computer Classes</h4>
      <p>Our computer classes provides the background to almost all computer careers like Software development, web development
      ,Photo Editing, Video editing, Interior design software use etc.</p>
    </div>
    <div class="col-sm-4">
      <img src="{{asset('img/images/sport.png')}}" width="100" alt="privine" />
      <h4>Sport</h4>
      <p>We Advice and provide enviroment that encourage sports as a career not limited 
      to resources both indoors and outdoor games
      </p>
    </div>
    <div class="col-sm-4">
      <img src="{{asset('img/images/repor.jpg')}}" width="100" alt="privine" />
      <h4>InternShip Programs</h4>
      <p>Internship programs was founded to expose our students to the world and equip them with the experience of living abroad
      . Internship to Boston, Sydney, London, Santa Ana etc
      </p>
    </div>
    </div>
    <br><br>
  <div class="row">
    <div class="col-sm-4">
      <img src="{{asset('img/images/invent.jpg')}}" width="100" alt="privine" />
      <h4>Foreign Languages</h4>
      <p>Language study every student has the option of studying three foreign languages, with English as the no option subject.
      Languages include English, madrin, spanish, german, french, latin etc
      </p>
    </div>
    <div class="col-sm-4">
      <img src="{{asset('img/accounts/finance2.jpg')}}" width="100" alt="privine" />
      <h4>Creativity Call</h4>
      <p>This is call or rather an assembly to encourage students to find thier passions and bring creativity to their lives.
      This is supported by stuff by expossing world invesion and achievents world wide
      </p>
    </div>
    <div class="col-sm-4">
      <img src="{{asset('img/images/index.jpg')}}" width="100" alt="privine" />
      <h4>Gifts and talent show</h4>
      <p>We encounge and provide an encouraging enviroment to invest on their talents and gifts</p>
    </div>
  </div>
</div></div> 

            <div class="container-fluid carodiv3 cd-fixed-bg.cd-bg-2">
    <div class="col-sm-3"><br />
        <img src="{{asset('img/images/foto1.jpg')}}" class="img-responsive img-thumbnail imgstyle" alt="chantosweb developers web applications" />
    </div>
    <div class="col-sm-9">
      <h1 class="specialh">OUR VALUES</h1><br>
      <h3  class="specialh"><strong>Mission: </strong>
       To bridge the gap between the local education and global level of Education
</h3>

<br>
      <p class="specialh"><strong>Vision::</strong>Is to be the best in providing a work force that bring 
      creativity and efficiency in their area of expertise</p>
    </div>
  
</div> 
<div  class="container-fluid text-center alterdiv2">
  <h1>Our code</h1><br>
  </div>
<div class="container-fluid text-center carodiv2">
     <div class="col-sm-4">
      <div class="thumbnail">
      <img src="{{asset('img/images/foto2.jpg')}}" class="img-responsive imgstyle" alt="privine" />
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
      <img src="{{asset('img/images/foto4.jpg')}}" class="img-responsive imgstyle" alt="privine" />
        <p><strong>Web applications</strong></p>
        <p>Our e commerce sites examples include catering websites, online shopping website with a cart, online ticket reservation website, doctors appointment reservation website equipped with an E.R.P and much more.</p>
      </div>
    </div>
    </div>
<div class="container-fluid alterdiv1" id="customers" align="center">
<div class="col-sm-12">
  <h1 align="center">Testimonies</h1>
  <div id="myCarousel" class="carousel slide text-center" 
data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" 
class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active">
      <p>@myrachanto</p>
        <h4>They provided me with exception quality and in time services</h4>
      </div>
      <div class="item">
      <p>@Janedoe</p>
        <h4>Before I hired them, payrolls and tax filling days were nightmares</h4>
      </div>
      <div class="item">
      <p>@Johndoe</p>
        <h4>Their advices on how, when and where to invest give my business a jolt that gave us reach we could not even hope for</h4>
      </div></div>
    </div>
<div class="container-fluid alterdiv3" >
<div class="well">
<div class="row">
<div class="col-lg-12">
	<h3 class="h14"><a href="">Our location on the grid</a></h4>
       <!-- Set height and width with CSS -->
<div id="googleMap" style="height:200px;width:100%;"></div>

<!-- Add Google Maps -->
<script src="http://maps.googleapis.com/maps/api/js"></script>
<script>
var myCenter = new google.maps.LatLng(-1.2846303, 36.8479223);

function initialize() {
var mapProp = {
center:myCenter,
zoom:12,
scrollwheel:false,
draggable:false,
mapTypeId:google.maps.MapTypeId.ROADMAP
};

var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);

var marker = new google.maps.Marker({
position:myCenter,
});

marker.setMap(map);
}

google.maps.event.addDomListener(window, 'load', initialize);
</script>
    </div>

</div>
</div>
</div>
@endsection