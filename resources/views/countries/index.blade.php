@extends('layouts.app', ['title' => __('Country Management')])

@section('content')

    <div class="header bg-primary bg-gradient-primary pb-6 pt-3 pt-md-8">
	    <div class="container-fluid">
	        <div class="header-body">
	           <div class="row align-items-center py-4">
	    <div class="col-lg-6 col-7">
	        <h6 class="h2 text-white d-inline-block mb-0">Administration</h6>
	        <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
	            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
	                <li class="breadcrumb-item"><a href="https://argon-dashboard-pro-laravel.creative-tim.com/dashboard"><i class="fas fa-home"></i></a></li>
	                <li class="breadcrumb-item"><a href="{{route('country.index')}}">Country</a></li>
	            <li class="breadcrumb-item active" aria-current="page">List</li>
	            </ol>
	        </nav>
	    </div>
	            <div class="col-lg-6 col-5 text-right">
	            <a href="{{ route('country.create') }}" class="btn btn-sm btn-neutral">New</a>
	        </div>
	    </div>
	        </div>
	    </div>
	</div>

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col">
                <div class="table-responsive card shadow">
                    <div class="card-header border-0">
                        <div class="row align-items-center">
                            <div class="col-8">
                                <h3 class="mb-0">{{ __('Countries') }}</h3>
                            </div>
                            <div class="col-4 text-right">
                                <a href="{{ route('country.create') }}" class="btn btn-sm btn-primary">{{ __('Add a country') }}</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-12">
                        @if (session('status'))
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                {{ session('status') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                    </div>


					@if ($message = Session::get('success'))
						<div class="alert alert-success">
							<p>{{ $message }}</p>
						</div>
					@endif


					<table class="table table-bordered bootstrap-datatable datatable bg-white" style="width:100%;">
					  <tr>
						 <th>Code</th>
						 <th>Name</th>
						 <th>Currency</th>
						 <th>ISO 4217</th>
						 <th width="280px">Action</th>
					  </tr>
						@php $i=0; @endphp
						@foreach ($countries as $key => $country)
						<tr>
							<td>{{ $country->code }}</td>
							<td>{{ $country->name }}</td>
							<td>{{ $country->currency }}</td>
							<td>{{ $country->iso_4217_currency_code }}</td>
							<td>
								<div class="dropdown">
									<a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fas fa-ellipsis-v"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a class="dropdown-item" href="{{ route('country.show',$country->id) }}">{{ __('List') }}</a>
										@can('country-edit')
										<a class="dropdown-item" href="{{ route('country.edit',$country->id) }}">{{ __('Edit') }}</a>
										@endcan
										@can('country-delete')
										<form action="{{ route('country.destroy', $country->id) }}" method="post">
											@csrf
											@method('delete')
											<button type="button" class="dropdown-item" onclick="confirm('{{ __("Are you sure you want to delete the country?") }}') ? this.parentElement.submit() : ''">
												{{ __('Remove') }}
											</button>
										</form>
										@endcan
									</div>
								</div>
							</td>
						</tr>
						@endforeach
					</table>
                </div>
				<div class="card-footer py-4">
					<nav class="d-flex justify-content-end" aria-label="...">
						{{ $countries->links() }}
					</nav>
				</div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
