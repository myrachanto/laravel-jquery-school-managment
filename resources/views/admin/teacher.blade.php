@extends('default')

@section('content')
   <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/index.jpg')}}" width="60" height="60" alt="myrachanto"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$teacher->count()}}</div>
                                    <div>View Information</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/admin/teacher/personal')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Teacher Personal information</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a><a href="{{url('admin/teacher/extra')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Teacher Progress report</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="{{url('admin/teacher/extra')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Teacher extra_curriculum activities</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                    </div>
                </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/index.jpg')}}" width="60" height="60" alt="transaction"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$teacher->count()}}</div>
                                    <div>Set ups</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/admin/teacher') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Add a new Teacher</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a><a href="{{url('/admin/teacher/lists')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Teachers</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="{{ url('/admin/accountant') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Add a new Accountant</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                        </a><a href="{{url('/admin/teacher/Alists')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View Accountants</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                    </div>
                </div> </div>
 
@endsection
