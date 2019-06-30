@extends('layouts.app')

@section('breadcrump')



@endsection
@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				@if (count($hasil))
				<strong>Hasil Pencarian :<b>{{$query}}</b></strong>
				@if (Auth::user())
				<form name="create" method="post" action="{{route('customer.create')}}" id="formCreate">
					{{ method_field('GET') }}
					{{ csrf_field() }}
					<button type="submit" class="btn btn-primary btn-sm">Create</button>
				</form>
				@endif
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
							<th>Name</th>
							<th>Phone</th>
							<th>Email</th>
							<th>Website</th>
							<th>Logo</th>
							@if (Auth::user())
							<th>Opsi</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@php $no=1; @endphp
						@foreach ($hasil as $customer)
							<tr>
								<td>{{ $no++ }}.</td>
								<td>{{ $customer->name }}</td>
								<td>{{ $customer->phone }}</td>
								<td>{{ $customer->email }}</td>
								<td>{{ $customer->website }}</td>
								<td><img src="{{ url('uploadgambar')}}/{{$customer->logo}}" style="width: 100px; height: 100px"></td>
								@if (Auth::user())
								<td class="left">
										<button type="submit" class="btn btn-primary btn-sm" form='formEdit{{$customer->id}}'><i class="fa fa-edit"></i></button>
										<button type="submit" class="btn btn-danger btn-sm" " form='formHapus{{$customer->id}}'><i class="fa fa-trash"></i></button>
										<form name="{{$customer->id}}" method="post" action="{{route('customer.edit', [$customer->id])}}" id="formEdit{{$customer->id}}">
											{{ method_field('GET') }}
											{{ csrf_field() }}
										</form>
										<form name="{{$customer->id}}" method="post" action="{{route('customer.destroy', [$customer->id])}}" id="formHapus{{$customer->id}}">
											{{ method_field('DELETE') }}
											{{ csrf_field() }}
										</form>
									</td>
									@endif
								
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
	@else
   <div class="card-panel red darken-3 white-text">Oops.. Data <b>{{$query}}</b> Tidak Ditemukan</div>
@endif
@endsection