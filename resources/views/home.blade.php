@extends('layouts.main')

@section('container')

<div class="row">
    {{-- Alerts --}}
    @if(session()->has('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success') }}
        </div>
    @endif
    
    <div class="col-md-6">
        <h1 style="margin-top: 200px">Welcome</h1>
        <p>This is an example How to use Laravel with Leaflet JS</p>
        <a href="/map" class="btn btn-primary">Example</a>
    </div>
    <div class="col-md-6 text-center">
        <img src="{{ asset('images/Bonevian.png') }}" alt="Logo" width="500" class="mt-3">
    </div>
</div>
{{-- <div class="card text-dark mt-5 text-center">
    <h5 class="card-header">Welcome</h5>
    <div class="card-body">
      <h5 class="card-title">Laravel GIS</h5>
      <p class="card-text">This is a simple example that will show how to implement leaflet js inside laravel</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
</div> --}}

@endsection