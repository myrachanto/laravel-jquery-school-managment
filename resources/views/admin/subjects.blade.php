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
                                    <div class="huge">{{$subjectnav->count()}}</div>
                                    <div>View Information</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/admin/subject/subjects')}}">
                            <div class="panel-footer">
                                <span class="pull-left">view subjects</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a><a href="{{url('/admin/exam/result')}}">
                            <div class="panel-footer">
                                <span class="pull-left">View subject performance by class</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View teacher subject distribution</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                    </div>
                </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/imag.jpg')}}" width="60" height="60" alt="transaction"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$subjectnav->count()}}</div>
                                    <div>Set ups</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{url('/admin/subject/lists')}}">
                            <div class="panel-footer">
                                <span class="pull-left">Assing teachers to class and subjects</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <a href="{{url('/admin/subject/lists')}}">
                            <div class="panel-footer">
                                <span class="pull-left">create time table</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                    </div>
                </div> </div>
 
@endsection
