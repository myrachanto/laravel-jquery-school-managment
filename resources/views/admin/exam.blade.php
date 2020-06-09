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
                                    <div class="huge">{{$exam->count()}}</div>
                                    <div>View Information</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/admin/exam/result') }}">
                            <div class="panel-footer">
                                <span class="pull-left">view exam results</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                            <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Progress report</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                    </div>
                </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/imag3.jpg')}}" width="60" height="60" alt="transaction"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$classes->count()}}</div>
                                    <div>feed the exams results</div>
                                </div>
                            </div>
                        </div>  
                        <a href="{{ url('/admin/exam') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Create an exam</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                        @foreach($classes as $z)
                        <a href="{{ url('/admin/exam/part1') }}/{{$z -> name}}">
                            <div class="panel-footer">
                                <span class="pull-left">{{$z -> description}}</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                      @endforeach
                    </div>
                </div> </div>
 
@endsection
