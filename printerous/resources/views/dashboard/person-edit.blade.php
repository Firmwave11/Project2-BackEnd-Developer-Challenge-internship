@extends('layouts.app')

@section('style')
	<link rel="stylesheet" type="text/css" href="{{ asset('assets/datatables/css/dataTables.bootstrap.min.css') }}">
@endsection
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<strong>Edit Data person</strong>
			</div>
			<div class="panel-body">
				<@if (session('status'))
					<div class="alert alert-success">
						<a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
					  	<strong>Success!</strong> {{ session('status') }}
					</div>
				@endif 
			
				<form method="post" action="{{route('person.update', [$person->id] )}}" enctype="multipart/form-data" >
					{{ csrf_field() }}
					{{ method_field('PATCH') }}
					
					<div class="col-md-6">
						<div class="form-group">
							<label>Name :</label>
							<input type="text" name="name" class="form-control" required="required" placeholder="Name person..." value="{{ $person->name }}">
						</div>
						<div class="form-group">
							<label>Phone :</label>
							<input type="text" name="phone" class="form-control" required="required" placeholder="Phone person..."
							value="{{ $person->phone }}" >
						</div>
						<div class="form-group">
							<label>Email :</label>
							<input type="email" name="email" class="form-control" placeholder="Email.."value="{{ $person->email }}"></input>
						</div>
						<div class="form-group">

							<label for='company_id'>Organization yang ada :</label>

							<select  id='customer_id' name='customer_id' class="form-control">
							@foreach ($customer as $customer)
							<option value="{{ $customer-> id }}">{{ $customer-> name }}</option>
							@endforeach
							</select>
							
						</div>							
						<div class="form-group">
							<label>Avatar :</label>
							<input type="file" name="avatar" class="form-control" value="{{ $person->avatar }}"></input>
						</div>
		
						    <button type="submit" class="btn btn-primary btn-sm">Save The Change</button>

						</div>

				</form>
			</div>
		</div>
	</div>
</div>
@endsection
<script>
    var msg = '{{Session::get('alert')}}';
    var exist = '{{Session::has('alert')}}';
    if(exist){
      alert(msg);
    }
  </script>