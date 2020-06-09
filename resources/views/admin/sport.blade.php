@extends('default')

@section('content')
   <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/images/sport.png')}}" width="60" height="60" alt="myrachanto"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$curriculum->count()}}</div>
                                    <div>View Information</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">view extra-curriculum activities and perfomance</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a><a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View sports and performance</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View other</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                    </div>
                </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/images/sport.png')}}" width="60" height="60" alt="transaction"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$curriculum->count()}}</div>
                                    <div>Set ups</div>
                                </div>
                            </div>
                        </div>
                            <a href="{{ url('/admin/curriculum') }}">
                            <div class="panel-footer">
                                <span class="pull-left">create a new extra-curriculum activity</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="{{ url('/admin/curriculum') }}">
                            <div class="panel-footer">
                                <span class="pull-left">create new sport</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="{{ url('/admin/blog') }}">
                            <div class="panel-footer">
                                <span class="pull-left">create new Blog</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="{{ url('/admin/career') }}">
                            <div class="panel-footer">
                                <span class="pull-left">create new Career Advice</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="{{ url('/admin/portfolio') }}">
                            <div class="panel-footer">
                                <span class="pull-left">create new  Portfolio</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                    </div>
                </div> </div>
 
@endsection
