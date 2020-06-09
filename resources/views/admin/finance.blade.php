@extends('default')

@section('content')
   <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/images.jpg')}}" width="60" height="60" alt="myrachanto"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$finance->count()}}</div>
                                    <div>View Information</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/admin/finances/paymentflow') }}">
                            <div class="panel-footer">
                                <span class="pull-left">view student payment flow and balances</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                        <a href="{{ url('/admin/finances/fees') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View termwise fees</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View other </span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                    </div>
                </div>
                  <div class="col-lg-6 col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3"><img src="{{asset('img/images.jpg')}}" width="60" height="60" alt="transaction"/>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{$finance->count()}}</div>
                                    <div>Set ups</div>
                                </div>
                            </div>
                        </div>
                        <a href="{{ url('/admin/expence') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Create a New expence</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a><a href="{{ url('/admin/finances/part1') }}">
                            <div class="panel-footer">
                                <span class="pull-left">Create a new invoice</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            <a href="{{ url('/admin/finances') }}">
                            <div class="panel-footer">
                                <span class="pull-left">File a Student Payment</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                            
                            <a href="{{ url('/admin/finances/invoicelist') }}">
                            <div class="panel-footer">
                                <span class="pull-left">View Invoices</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right">&#8594;</i></span>
                                <div class="clearfix"></div>
                            </div></a>
                    </div>
                </div> </div>
 
@endsection
