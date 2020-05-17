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
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6">
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
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6">
                                                        <div class="card card-stats mb-4 mb-xl-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h6 class="card-title text-uppercase text-muted mb-0">Insurance</h6>
                                                                        <span class="h6 font-weight-bold mb-0">Not subscribed</span>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                                            <i class="fas fa-users"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mt-3 mb-0 text-muted text-sm">
                                                                    <span class="text-warning mr-2"><i class="fas fa-arrow-down"></i> 0</span>
                                                                    <span class="text-nowrap">500 total</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6">
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
                                                                    <span class="text-success mr-2"><i class="fas fa-arrow-up"></i> 1</span>
                                                                    <span class="text-nowrap">Paypal</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <h6 class="h2 text-default text-center d-inline-block mb-0">National Services</h6>
                                                <div class="row mt-1">
                                                    <div class="col-xl-3 col-lg-6">
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
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6">
                                                        <div class="card card-stats mb-4 mb-xl-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h5 class="card-title text-uppercase text-muted mb-0">Insurance</h5>
                                                                        <span class="h2 font-weight-bold mb-0">92</span>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="icon icon-shape bg-yellow text-white rounded-circle shadow">
                                                                            <i class="fas fa-users"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mt-3 mb-0 text-muted text-sm">
                                                                    <span class="h6 text-success mr-2"><i class="fas fa-arrow-up"></i> subscribed </span>
                                                                    <span class="text-nowrap">Since yesterday</span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-3 col-lg-6">
                                                        <div class="card card-stats mb-4 mb-xl-0">
                                                            <div class="card-body">
                                                                <div class="row">
                                                                    <div class="col">
                                                                        <h5 class="card-title text-uppercase text-muted mb-0">e-payment</h5>
                                                                        <span class="h2 font-weight-bold mb-0">7</span>
                                                                    </div>
                                                                    <div class="col-auto">
                                                                        <div class="icon icon-shape bg-info text-white rounded-circle shadow">
                                                                            <i class="fas fa-money-check"></i>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <p class="mt-3 mb-0 text-muted text-sm">
                                                                    <span class="h6 text-success mr-2"><i class="fas fa-arrow-up"></i>Subscribed</span>
                                                                    <span class="text-nowrap">Since last month</span>
                                                                </p>
                                                            </div>
                                                        </div>
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
                                                <span class="bg-white badge badge-lg badge-success" font-size="10px">transfer money</span>
                                                <span class="bg-white badge badge-lg badge-success" font-size="10px">Credit account</span>
                                            </div>
                                        </div>
                                        <div class="my-4">
                                            <span class="h6 surtitle text-light">
                                            My account
                                        </span>
                                            <div class="card-serial-number h1 text-white">
                                                <div>Balance</div>
                                                <div>7421</div>
                                                <div>Currency</div>
                                                <div>XAF</div>
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
                                                <span class="h2 font-weight-bold mb-0 text-white">350</span>
                                            </div>
                                            <div class="col-auto">
                                                <div class="icon icon-shape bg-white text-dark rounded-circle shadow">
                                                    <i class="ni ni-active-40"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mt-3 mb-0 text-sm">
                                            <span class="text-white mr-2"><i class="fa fa-arrow-up"></i></span>
                                            <span class="text-nowrap text-light">Since last month</span>
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
                                    <th scope="col">Destination</th>
                                    <th scope="col">Amount</th>
                                    <th scope="col">Additional fees</th>
                                    <th scope="col">Total costs</th>
                                    <th scope="col">Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">

                                    </th>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                    <td>

                                    </td>
                                </tr>
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
                            <!-- Card search -->
                            <div class="card-header py-0">
                                <!-- Search form -->
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
                            </div>
                            <!-- Card body -->
                            <div class="card-body">
                                <!-- List group -->
                                <ul class="list-group list-group-flush list my--3">
                                    <li class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <a href="#" class="avatar rounded-circle">
                                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/brand/favicon.png">
                                                </a>
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0">
                                                    <a href="#!">Electricity bills</a>
                                                </h4>
                                                <span class="text-success">●</span>
                                                <small>Available</small>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-sm btn-primary">see more</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <a href="#" class="avatar rounded-circle">
                                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/brand/favicon.png">
                                                </a>
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0">
                                                    <a href="#!">TV / internet</a>
                                                </h4>
                                                <span class="text-warning">●</span>
                                                <small>Unavailable</small>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-sm btn-primary">see more</button>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item px-0">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <!-- Avatar -->
                                                <a href="#" class="avatar rounded-circle">
                                                    <img alt="Image placeholder" src="{{ asset('argon') }}/img/brand/favicon.png">
                                                </a>
                                            </div>
                                            <div class="col ml--2">
                                                <h4 class="mb-0">
                                                    <a href="#!">Water bills</a>
                                                </h4>
                                                <span class="text-success">●</span>
                                                <small>Available</small>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-sm btn-primary">see more</button>
                                            </div>
                                        </div>
                                    </li>
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
