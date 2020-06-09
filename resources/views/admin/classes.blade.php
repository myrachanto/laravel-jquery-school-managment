@extends('default')

@section('content')
   <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/repor.jpg')}}" width="60" height="60" alt="myrachanto"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$classes->count()}}</div>
                                    <div>View Information</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/admin/exam/result')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View class performance</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                            <a href="{{ url('/admin/extra') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Extra-curriculum activities</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">class library</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="{{ url('/admin/yos/promotion1') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Promote a class</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a></a>
                            <a href="{{ url('/admin/yos/expulsionlsit') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Expulsion list</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a></a>
                            <a href="{{ url('/admin/yos/checkclass') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View classes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                    </div>
                </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/repor.jpg')}}" width="60" height="60" alt="transaction"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$classes->count()}}</div>
                                    <div>Set ups</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/admin/library') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Add a new book</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a><a href="{{ url('/admin/classes') }}">
                            <div class="panel-footer">
                                <span class="pull-left">add new classes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="{{ url('/admin/yearclass') }}">
                            <div class="panel-footer">
                                <span class="pull-left">add new Year classes</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="{{ url('/admin/curriculum') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Add new extra-curriculum activity</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a></a>
                            <a href="{{ url('/admin/yos') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Add new Year of study</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                    </div>
                </div> </div>
 
@endsection
