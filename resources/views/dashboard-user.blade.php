@extends('layouts.app')

@section('content')
<div class="header bg-gradient-primary pl-0 pr-0 pb-8 pt-2 pt-md-5">
        <div class="header-body">
            <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-xl-8 mb-5 mb-xl-0">
                        <div class="table-responsive card shadow">
                            <div class="table-responsive">
                                <div class="header bg-gradient pb-3 pt-0 pt-md-3">
                                        <div class="container-fluid">
                                            <div class="header-body">
                                                <!-- Card stats -->
                                                <h6 class="h2 text-default text-center d-inline-block mb-0">International Services</h6>
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-6">
                                                        <a href="#" data-toggle="modal" data-target="#internationalbanqueModal">
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="internationalbanqueModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    ...
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                            <div class="card card-stats mb-4 mb-xl-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h5 class="card-title text-uppercase text-muted mb-0">bank</h6>
                                                                        <span class="h5 font-weight-bold mb-0">Subscribed</span>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                                            <i class="fas fa-chart-bar"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mt-3 mb-0 text-muted text-sm">
                                                                    <span class="text-success mr-2"><i class="fa fa-arrow-up"></i> 1 </span>
                                                                    <span class="text-nowrap">Western Union</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6">
                                                        <a href="#" data-toggle="modal" data-target="#internationalFinanceModal">
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="internationalFinanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ...
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="card card-stats mb-4 mb-xl-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6 class="card-title text-uppercase text-muted mb-0">Finance</h6>
                                                                        <span class="h6 font-weight-bold mb-0">Not subscribed</span>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                                            <i class="fas fa-chart-pie"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mt-3 mb-0 text-muted text-sm">
                                                                    <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> 0</span>
                                                                    <span class="text-nowrap">230 total</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6">
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="internationalInsurenceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <!-- ici -->
                                                                <div class="header">
                                                                    <div class="container-fluid">
                                                                <div class="header-body">
                                                                    <!-- Card stats -->
                                                                    <div class="row">

                                                                        <div class="col-xl-6 col-lg-12 pt-1">
                                                                            <div class="card card-stats mb-1 mb-xl-0">
                                                                                <a href="#">
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <h5 class="card-title text-uppercase text-muted mb-0">bb</h5>
                                                                                            <span class="h3 font-weight-bold mb-0">nn</span>
                                                                                        </div>
                                                                                        <div class="col-auto">
                                                                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                                                                <i class="fas fa-lock"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <p class="mt-3 mb-0 text-muted text-sm">
                                                                                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> Type: </span>
                                                                                        <span class="text-nowrap">Boutique</span>
                                                                                    </p>
                                                                                </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                        <div class="col-xl-6 col-lg-12 pt-1">
                                                                            <div class="card card-stats mb-1 mb-xl-0">
                                                                                <a href="#">
                                                                                <div class="card-body">
                                                                                    <div class="row">
                                                                                        <div class="col">
                                                                                            <h5 class="card-title text-uppercase text-muted mb-0">bb</h5>
                                                                                            <span class="h3 font-weight-bold mb-0">nn</span>
                                                                                        </div>
                                                                                        <div class="col-auto">
                                                                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                                                                <i class="fas fa-lock"></i>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                                                                    <p class="mt-3 mb-0 text-muted text-sm">
                                                                                        <span class="text-danger mr-2"><i class="fas fa-arrow-down"></i> Type: </span>
                                                                                        <span class="text-nowrap">Boutique</span>
                                                                                    </p>
                                                                                </div>
                                                                                </a>
                                                                            </div>
                                                                        </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                                <!-- ici -->
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <a href="#" data-toggle="modal" data-target="#internationalInsurenceModal">
                                                        <div class="card card-stats mb-4 mb-xl-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6 class="card-title text-uppercase text-muted mb-0">Insurance</h6>
                                                                        <span class="h6 font-weight-bold mb-0">Not subscribed</span>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                                            <i class="fas fa-newspaper"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mt-3 mb-0 text-muted text-sm">
                                                                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 0</span>
                                                                    <span class="text-nowrap">500 total</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6">
                                                        <!-- Modal -->
                                                            <div class="modal fade" id="internationalpaymentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Payments method</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- ici -->
                                                                    <div class="header-body">
                                                                        <!-- Card stats -->
                                                                        <div class="row">

                                                                            @foreach($payments as $p)
                                                                            <div class="col-xl-6 col-lg-12 pt-1">
                                                                                <div class="card card-stats mb-1 mb-xl-0">
                                                                                    <a href="{{ route('method.payments',$p->id) }}">
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <h5 class="card-title text-uppercase text-muted mb-0">{{$p->name}}</h5>
                                                                                                <span class="h6 font-weight-bold mb-0">{{$p->description}}</span>
                                                                                            </div>
                                                                                            <div class="col-auto">
                                                                                                <div class="icon icon-shape rounded-circle shadow">
                                                                                                    <img class="rounded-circle shadow" width="30" src="{{asset('/assets/img/payments/'.$p->payment_img)}}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <p class="mt-3 mb-0 text-muted text-sm">
                                                                                            <span class="text-info mr-2"><i class="fas fa-arrow-down"></i> Infos: </span>
                                                                                            <span class="text-nowrap">Clic here</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            @endforeach

                                                                        </div>
                                                                    </div>
                                                                    <!-- ici -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        <a href="#" data-toggle="modal" data-target="#internationalpaymentModal">
                                                        <div class="card card-stats mb-4 mb-xl-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6 class="card-title text-uppercase text-muted mb-0">e-payments</h6>
                                                                        <span class="h6 font-weight-bold mb-0">Subscribed</span>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                                            <i class="fas fa-money-check"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mt-3 mb-0 text-muted text-sm">
                                                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i>@if(!empty($payments)) {{ $payments->count() }} @else 0 @endif</span>
                                                                    <span class="text-nowrap">Clic here</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>
                                                </div>
                                                <h6 class="h2 text-default text-center d-inline-block mb-0">National Services</h6>
                                                <div class="row mt-1">
                                                    <div class="col-xl-3 col-lg-6">
                                                        <a href="#" data-toggle="modal" data-target="#localbankModal">
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="localbankModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                              <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                  <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                      <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                  </div>
                                                                  <div class="modal-body">
                                                                    ...
                                                                  </div>
                                                                  <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                  </div>
                                                                </div>
                                                              </div>
                                                            </div>
                                                        <div class="card card-stats mb-4 mb-xl-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h5 class="card-title text-uppercase text-muted mb-0">Banks</h5>
                                                                        <span class="h2 font-weight-bold mb-0">1</span>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="icon icon-shape bg-danger text-white rounded-circle shadow">
                                                                            <i class="fas fa-chart-bar"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mt-3 mb-0 text-muted text-sm">
                                                                    <span class="h6 text-success mr-2"><i class="fa fa-arrow-up"></i> Subscribed</span>
                                                                    <span class="text-nowrap">Since last month</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6">
                                                        <a href="#" data-toggle="modal" data-target="#localfinanceModal">
                                                        <!-- Modal -->
                                                        <div class="modal fade" id="localfinanceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                ...
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                <button type="button" class="btn btn-primary">Save changes</button>
                                                            </div>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <div class="card card-stats mb-4 mb-xl-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h5 class="card-title text-uppercase text-muted mb-0">Finance</h5>
                                                                        <span class="h2 font-weight-bold mb-0">50</span>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="icon icon-shape bg-warning text-white rounded-circle shadow">
                                                                            <i class="fas fa-chart-pie"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mt-3 mb-0 text-muted text-sm">
                                                                    <span class="h6 text-success mr-2"><i class="fas fa-arrow-up"></i> Subscribe</span>
                                                                    <span class="text-nowrap">Since last week</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6">
                                                        <a href="#" data-toggle="modal" data-target="#localInsuranceModal">
                                                            <!-- Modal -->
                                                            <div class="modal fade" id="localInsuranceModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    ...
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                            <div class="card card-stats mb-4 mb-xl-0">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <h5 class="card-title text-uppercase text-muted mb-0">Insurance</h5>
                                                                            <span class="h2 font-weight-bold mb-0">92</span>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                                                <i class="fas fa-newspaper"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mt-3 mb-0 text-muted text-sm">
                                                                        <span class="h6 text-success mr-2"><i class="fas fa-arrow-up"></i> subscribed </span>
                                                                        <span class="text-nowrap">Since yesterday</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6">
                                                        <!-- Modal -->
                                                            <div class="modal fade" id="localPayementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                            <div class="modal-dialog modal-dialog" role="document">
                                                                <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title" id="exampleModalLabel">Payments method</h5>
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    </button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <!-- ici -->
                                                                    <div class="header-body">
                                                                        <!-- Card stats -->
                                                                        <div class="row">

                                                                            @foreach($payments as $p)
                                                                            <div class="col-xl-6 col-lg-12 pt-1">
                                                                                <div class="card card-stats mb-1 mb-xl-0">
                                                                                    <a href="{{ route('method.payments',$p->id) }}">
                                                                                    <div class="card-body">
                                                                                        <div class="row">
                                                                                            <div class="col">
                                                                                                <h5 class="card-title text-uppercase text-muted mb-0">{{$p->name}}</h5>
                                                                                                <span class="h6 font-weight-bold mb-0">{{$p->description}}</span>
                                                                                            </div>
                                                                                            <div class="col-auto">
                                                                                                <div class="icon icon-shape rounded-circle shadow">
                                                                                                    <img class="rounded-circle shadow" width="30" src="{{asset('/assets/img/payments/'.$p->payment_img)}}">
                                                                                                </div>
                                                                                            </div>
                                                                                        </div>
                                                                                        <p class="mt-3 mb-0 text-muted text-sm">
                                                                                            <span class="text-info mr-2"><i class="fas fa-arrow-down"></i> Infos: </span>
                                                                                            <span class="text-nowrap">Clic here</span>
                                                                                        </p>
                                                                                    </div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                            @endforeach

                                                                        </div>
                                                                    </div>
                                                                    <!-- ici -->
                                                                </div>
                                                                <div class="modal-footer">
                                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                                </div>
                                                                </div>
                                                            </div>
                                                            </div>
                                                        <a href="#" data-toggle="modal" data-target="#localPayementModal">
                                                            <div class="card card-stats mb-4 mb-xl-0">
                                                                <div class="card-body">
                                                                    <div class="row">
                                                                        <div class="col">
                                                                            <h5 class="card-title text-uppercase text-muted mb-0">e-payment</h5>
                                                                            <span class="h5 font-weight-bold mb-0">@if(!empty($payments)) {{ $payments->count() }} @else 0 @endif</span>
                                                                        </div>
                                                                        <div class="col-auto">
                                                                            <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                                                <i class="fas fa-money-check"></i>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mt-3 mb-0 text-muted text-sm">
                                                                        <span class="h6 text-success mr-2"><i class="fas fa-arrow-up"></i>Subscribed</span>
                                                                        <span class="text-nowrap">Clic here</span>
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4">
                        <div class="table-responsive card shadow bg-none">
                            <div class="table-responsive bg-gradient-default">
                                <!-- Visa card -->
                                <div class="card bg-gradient-default">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row justify-content-between align-items-center">
                                            <div class="col">
                                                <img width="100px" src="{{ asset('argon') }}/img/brand/white.png" alt="Image placeholder" />
                                            </div>
                                            <div class="col-auto">
                                            <a href="#" data-toggle="modal" data-target="#modalTrRenotification">
                                            <span class="bg-white badge badge-lg badge-success" font-size="10px">transfer / credit</span>
                                            <!--<span class="bg-white badge badge-lg badge-success" font-size="10px">Credit account</span>-->
                                            <div class="modal fade" id="modalTrRenotification" tabindex="-1" role="dialog" aria-labelledby="modal-notification" aria-hidden="true">
                                                <div class="modal-dialog modal-danger modal-dialog-centered modal-" role="document">
                                                    <div class="modal-content bg-gradient-danger">

                                                        <div class="modal-header">
                                                            <h6 class="modal-title" id="modal-title-notification">Your attention is required</h6>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                <span aria-hidden="true">×</span>
                                                            </button>
                                                        </div>

                                                        <div class="modal-body">

                                                            <div class="py-3 text-center">
                                                                <i class="ni ni-bell-55 ni-3x"></i>
                                                                <h4 class="heading mt-4">To make transactions or other services, please click on the corresponding name in the boxes.</h4>
                                                                <p>To credit or transfer money to another account, please click on the e-payment frame.The local section for local mode and international for other modes.</p>
                                                            </div>

                                                        </div>

                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-white" data-toggle="modal" data-target="#internationalpaymentModal">Ok, Got it</button>
                                                            <button type="button" class="btn btn-link text-white ml-auto" data-dismiss="modal">Close</button>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            </a>
                                            </div>
                                        </div>
                                        <div class="my-4">
                                            <span class="h6 surtitle text-light">
                                            My account
                                        </span>
                                            <div class="card-serial-number h1 text-white">
                                                <div>Balance</div>
                                                <div>{{ auth()->user()->account->balance }}</div>
                                                <div>Currency</div>
                                                <div>
                                                    @if(isset(auth()->user()->country))
                                                        {{ auth()->user()->country->iso_4217_currency_code }}
                                                    @else
                                                        <a href="{{ route('profile.edit') }}" class="btn btn-sm btn-primary">{{ __('update profile') }}</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col">
                                                <span class="h6 surtitle text-light">Name</span>
                                                <span class="d-block h3 text-white">{{ auth()->user()->name }}</span>
                                            </div>
                                            <div class="col">
                                                <span class="h6 surtitle text-light">type of account</span>
                                                <span class="d-block h3 text-white">{{ auth()->user()->type() }}</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Card stats -->
                                <div class="card bg-gradient-default mt-2">
                                    <!-- Card body -->
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col">
                                                <h5 class="card-title text-uppercase text-muted mb-0 text-white">Total traffic</h5>
                                                <span class="h2 font-weight-bold mb-0 text-white">@if(isset(auth()->user()->account->transactions)){{ auth()->user()->account->transactions->count() }}@else 0 @endif</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                                    <i class="ni ni-active-40"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-sm">
                                            <span class="text-white mr-2"><i class="fa fa-arrow-up"></i></span>
                                            <span class="text-nowrap text-light">Since {{ auth()->user()->created_at->diffForHumans()}}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

	<div class="container-fluid mt--7">
        <div class="row mt-5">
            <div class="col-xl-8 mb-5 mb-xl-0">
                <div class="table-responsive card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col">
                                <h3 class="mb-0">History of the last 10 transactions.</h3>
                            </div>
                            <div class="col text-right">
                                <a href="#!" class="btn btn-sm btn-primary">Download</a>
								<a href="#!" class="btn btn-sm btn-primary">sent</a>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <table class="table align-items-center table-flush">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">Transaction ID</th>
                                    <th scope="col">Type</th>
                                    <th scope="col">Description</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Additional fees</th>
                                    <th scope="col">Total costs</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(auth()->user()->account->transactions as $transaction)
                                <tr>
                                    <td>
                                        {{ $transaction->transaction_code }}
                                    </td>
                                    <td>
                                        {{ $transaction->type }}
                                    </td>
                                    <td>
                                        {{ $transaction->description }}
                                    </td>
                                    <td>
                                        {{ $transaction->amount }} {{ $transaction->iso_4217_currency_code }}
                                    </td>
                                    <td>
                                        0 {{ $transaction->iso_4217_currency_code }}
                                    </td>
                                    <td>
                                        {{ $transaction->amount }} {{ $transaction->iso_4217_currency_code }}
                                    </td>
                                    <td>
                                        {{ $transaction->created_at->diffForHumans() }}
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="table-responsive card shadow">
                    <div class="table-responsive">
                        <!-- Projects table -->
                        <div class="card">
                            <!-- Card header -->
                            <div class="card-header">
                                <!-- Title -->
                                <h5 class="h3 mb-0">Other services</h5>
                            </div>
                            <!-- Card search
                            <div class="card-header py-0">
                                <form>
                                    <div class="form-group mb-0">
                                        <div class="input-group input-group-lg input-group-flush">
                                            <div class="input-group-prepend">
                                                <div class="input-group-text">
                                                    <span class="fas fa-search"></span>
                                                </div>
                                            </div>
                                            <input type="search" class="form-control" placeholder="Search">
                                        </div>
                                    </div>
                                </form>
                            </div>-->
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush list my--3">
                                    @foreach($otherServices as $service)
                                    <li class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <a href="#" class="avatar rounded-circle">
                                                    <img alt="Image {{ $service->name }}" src="{{asset('/assets/img/services/'.$service->img)}}">
                                                </a>
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0">
                                                    <a href="#!">{{ $service->name }}</a>
                                                </h4>
                                                <span class="text-success">●</span>
                                                <small>Available</small>
                                            </div>
                                            <div class="col-auto">
                                                <a href="#" class="btn btn-sm btn-primary">see more</a>
                                            </div>
                                        </div>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @include('layouts.footers.auth')
    </div>
@endsection

@push('js')
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
    <script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush
