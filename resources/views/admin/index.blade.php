@extends('default')

@section('content')
   <div class="row">
                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/images.jpg')}}" width="60" height="60" alt="myrachanto"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$finance->count()}}</div>
                                    <div>Nortifications</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">New Payments</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a><a href="{{url('/admin/finances')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Payment status</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/special/email.gif')}}" width="60" height="60" alt="transaction"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$messages->count()}}</div>
                                    <div>Messages</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/admin/messages')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Private messages</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a><a href="{{url('/admin/general')}}">
                            <div class="panel-footer">
                                <span class="pull-left">General messages</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div>  <div class="col-lg-4 col-md-6">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/imag.jpg')}}" alt="chantosweb" width="60" height="60">
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$classes->count()}}</div>
                                    <div>timetables</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/admin/timetable/daywise')}}">
                            <div class="panel-footer">
                                <span class="pull-left">class timetable</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a><a href="{{url('/admin/timetable/daywise')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Individual timetable</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                    </div>
                </div>  </div> </div>
                
   <div class="row">


                <div class="col-lg-4 col-md-6">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/imag3.jpg')}}" width="60" height="60" alt="myrachanto"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$exam->count()}}</div>
                                    <div>Reports</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/admin/exams')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Class perfomance</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a><a href="{{url('/admin/exam/result')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Exams results </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                  <div class="col-lg-4 col-md-6">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/images/sport.png')}}" width="60" height="60" alt="transaction"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$curriculum->count()}}</div>
                                    <div>Extra curriculum </div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/admin/curriculum')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Extra curriculum activities</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a> <a href="{{url('/admin/curriculum')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Sports</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>  <div class="col-lg-4 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/report.jpg')}}" alt="chantosweb" width="60" height="60">
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$library->count()}}</div>
                                    <div>Extras</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/admin/library')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Library</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a><a href="{{url('/admin/message')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Message Parents</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>  
                </div>
                <div>
        
    </div></div></div>
    </div>
@endsection
