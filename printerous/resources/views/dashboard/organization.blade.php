@extends('layouts.app')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}">
@endsection

@section('content')
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Organization</strong>
			</div>
			<div class="panel-body">
				@if (session('status'))
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  	<strong>Success!</strong> {{ session('status') }}
					</div>
				@endif
				<table class="table">
					<thead>
						<tr>
							<th>No</th>
							<th>Organization</th>
							<th>Person</th>
						</tr>
					</thead>
					<tbody>
				@php $no=1; @endphp
						@foreach ($customer as $customer)
							<tr>
								<td>{{ $no++ }}.</td>
								<td>{{ $customer->name }}</td>
								
								<td>

									<ul style="padding-left: 16px;">
										@foreach($customer->person as $person)
											<li>{{ $person->name }}</li>
										@endforeach											
									</ul>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>

	<!-- Modal Area -->
	
@endsection
@section('script')
	<script src="{{ asset('assets/datatables/js/jquery.dataTables.min.js') }}"></script>
	<script src="{{ asset('assets/datatables/js/dataTables.bootstrap.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function() {
		    $('.table').DataTable();
		});

		function show(route) {
			$.get(route, function(data) {
				$('#show .modal-body').html(data);
			});
		}

	</script>
@endsection