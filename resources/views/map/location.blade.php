@extends('layouts.main')

@section('container')
<meta name="csrf-token" content="{{ csrf_token() }}" />

<style>
    #map { 
        height: 450px;
        margin-top: 25px; 
    }
</style>

<h1 class="text-center">Make Your Own Custom Location</h1>

{{-- Button --}}
<div class="text-end">
    <a href="/map/saved" class="mt-3 mb-2 btn btn-primary">View Saved Location</a>
</div>

<form action="/map/location" method="post">
    @csrf

    {{-- Errors --}}
    @if ($errors->has('location'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('location') }}
        </div>
    @endif
    @if ($errors->has('lat'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('lat') }}
        </div>
    @endif
    @if ($errors->has('long'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('long') }}
        </div>
    @endif

    {{-- Place For the Map --}}
    <div id='map' class="mb-5"></div>

    <div class="row">
        {{-- Location Name --}}
        <div class="col-md-6 mb-3 mt-3">
            <input type="text" class="form-control" data-action="{{ route('map.find') }}" id="location_name" name="location" placeholder="The City Of..." required>
            <div id="invalid_location" class="invalid-feedback"></div>
            <div id="valid_location" class="valid-feedback"></div>
        </div>

        {{-- Hidden --}}
        <input type="hidden" class="form-control" id="longitude" name="longitude" required>
        <input type="hidden" class="form-control" id="latitude" name="latitude" required>
    
        {{-- Button --}}
        <div class="col-md-6 mt-3 mb-3">
            <button type="submit" class="btn-primary btn form-control">Save</button>
        </div>
    </div>
</form>

@section('script')
    <script src="{{ asset('JS/Map/location.js') }}"></script>
@endsection

@endsection