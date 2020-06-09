@extends('default')

@section('content')
   <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/imag3.jpg')}}" width="60" height="60" alt="myrachanto"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>View extra curriculum activity</div>
                                </div>
                            </div>
                        </div>
                        @foreach($student as $z)
                        <a href="{{ url('/admin/student/extracurriculum')}}/{{$z ->id}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{$z -> username}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                      @endforeach
                    </div>
                </div>  <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/imag3.jpg')}}" width="60" height="60" alt="myrachanto"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">26</div>
                                    <div>View Progress report</div>
                                </div>
                            </div>
                        </div>
                        @foreach($student as $z)
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">{{$z -> username}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                      @endforeach
                    </div>
                </div> </div>
 
@endsection