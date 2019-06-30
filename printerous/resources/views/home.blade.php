@extends('layouts.app')

@section('breadcrump')
    <li class="active">Home</li>
@endsection

@section('content')


<div class="col-md-12>
    <div class="jumbotron">
        <p>Selamat datang <strong>CUSTOMER</strong>, untuk melihat data customer silahkan klik tombol dibawah ini :</p> 
        <p><a href="{{ route('organization') }}" class="btn btn-primary">Organization</a></p>
    </div>
</div>
@endsection