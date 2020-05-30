@extends('layouts.app', ['title' => __('Payment Management')])

@section('content')
    <div class="header bg-primary bg-gradient-primary pb-6 pt-3 pt-md-8">
        <div class="container-fluid">
            <div class="header-body">
               <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Administration</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
                <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                    <li class="breadcrumb-item"><a href=""><i class="fas fa-home"></i></a></li>
                    <li class="breadcrumb-item"><a href="{{route('payment.index')}}">Payments</a></li>
                <li class="breadcrumb-item active" aria-current="page">List</li>
                </ol>
            </nav>
        </div>
            <div class="col-lg-6 col-5 text-right">
                @can('payment-create')
                <a href="{{ route('payment.create') }}" class="btn btn-sm btn-neutral">New Payment method</a>
                @endcan
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
                                <h3 class="mb-0">{{ __('Users') }}</h3>
                            </div>
                            <div class="col-4 text-right">
							@can('payment-create')
                                <a href="{{ route('payment.create') }}" class="btn btn-sm btn-primary">{{ __('Add payment method') }}</a>
                            @endcan
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

                    <div class="table-responsive">
                        <table class="table align-items-center table-flush"  id="datatable-buttons">
                            <thead class="thead-light">
                                <tr>
                                    <th scope="col">{{ __('Image') }}</th>
                                    <th scope="col">{{ __('Name') }}</th>
									<th scope="col">{{ __('Description') }}</th>
                                    <th scope="col">{{ __('Method Accepted') }}</th>
									<th scope="col">{{ __('Number') }}</th>
									<th scope="col">{{ __('Partner') }}</th>
									<th scope="col">{{ __('Locality') }}</th>
                                    <th scope="col">{{ __('Creation date') }}</th>
                                    <th scope="col"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($payments as $payment)
                                    <tr>
                                        <td><img class="w-30 h-30" width="30" src="{{asset('/assets/img/payments/'.$payment->payment_img)}}"></td>
                                        <td>{{ $payment->name }}</td>
                                        <td>{{ $payment->description }}</td>
										<td>{{ $payment->method_accepted }}</td>
										<td>{{ $payment->number }}</td>
										<td>{{ $payment->partner->user->name }}</td>
										<td>{{ $payment->locality->name }}</td>
                                        <td>{{ $payment->created_at->format('d/m/Y H:i') }}</td>
                                        <td class="text-right">
                                            <div class="dropdown">
                                                <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v"></i>
                                                </a>
                                                @can('payment-list')
													<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
															<form action="{{ route('payment.destroy', $payment) }}" method="post">
																@csrf
																@method('delete')
																	@can('payment-list')
                                                                    <a class="dropdown-item" href="{{ route('payment.show',$payment->id) }}">{{ __('Show') }}</a>
																	@endcan
																	@can('payment-edit')
																	<a class="dropdown-item" href="{{ route('payment.edit',$payment->id) }}">{{ __('Edit') }}</a>
																	@endcan
																@can('payment-delete')
																<button type="button" class="dropdown-item" onclick="confirm('{{ __("are you sure you want to delete the payment method?") }}') ? this.parentElement.submit() : ''">
																	{{ __('Remove') }}
																</button>
																@endcan
															</form>
													</div>
												@endcan
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
 @push('js')
      <!-- Optional JS -->
      <script src="{{ asset('js/jquery.dataTables.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.buttons.min.js') }}"></script>
      <script src="{{ asset('js/buttons.bootstrap4.min.js') }}"></script>
      <script src="{{ asset('js/buttons.html5.min.js') }}"></script>
      <script src="{{ asset('js/buttons.flash.min.js') }}"></script>
      <script src="{{ asset('js/buttons.print.min.js') }}"></script>
      <script src="{{ asset('js/dataTables.select.min.js') }}"></script>
      <!-- Argon JS -->
      <script src="{{ asset('js/argon.min.js?v=1.1.0') }}"></script>
    </body>
</html>
@endpush
