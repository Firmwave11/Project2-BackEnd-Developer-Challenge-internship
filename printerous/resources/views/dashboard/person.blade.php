@extends('layouts.app')

@section('breadcrump')
<form class="form-inline my-2 my-lg-0" method="get" action="{{url('query2')}}">
   <input class="form-control mr-sm-2" type="text" name="q" placeholder="Kata Kunci" aria-label="Search">
    <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Cari</button>
</form>
@endsection
@section('content')
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Data Person</strong>
				@if (Auth::user())
				<form name="create" method="post" action="{{route('person.create')}}" id="formCreate">
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
							<th>Avatar</th>
							@if (Auth::user())
							<th>Opsi</th>
							@endif
						</tr>
					</thead>
					<tbody>
						@php $no=1; @endphp
						@foreach ($person as $person)
							<tr>
								<td>{{ $no++ }}.</td>
								<td>{{ $person->name }}</td>
								<td>{{ $person->phone }}</td>
								<td>{{ $person->email }}</td>
								<td><img src="{{ url('uploadgambar')}}/{{$person->avatar}}" style="width: 100px; height: 100px"></td>
								@if (Auth::user())
								<td class="left">
										<button type="submit" class="btn btn-primary btn-sm" form='formEdit{{$person->id}}'><i class="fa fa-edit"></i></button>
										<button type="submit" class="btn btn-danger btn-sm" " form='formHapus{{$person->id}}'><i class="fa fa-trash"></i></button>
										<form name="{{$person->id}}" method="post" action="{{route('person.edit', [$person->id])}}" id="formEdit{{$person->id}}">
											{{ method_field('GET') }}
											{{ csrf_field() }}
										</form>
										<form name="{{$person->id}}" method="post" action="{{route('person.destroy', [$person->id])}}" id="formHapus{{$person->id}}">
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
@endsection
