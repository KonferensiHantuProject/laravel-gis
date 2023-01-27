@extends('layouts.main')

@section('container')

<style>
    #map { 
        height: 450px;
        margin-top: 25px; 
    }
</style>

<h1 class="text-center">Save Custom Location</h1>

{{-- Button --}}
<div class="text-end">
    <a href="/map/saved" class="mt-3 mb-2 btn btn-primary">View Saved Location</a>
</div>

<form action="/map/location" method="post">
    @csrf

    @if ($errors->has('location'))
        <div class="alert alert-danger" role="alert">
            {{ $errors->first('location') }}
        </div>
    @endif

    {{-- Place For the Map --}}
    <div id='map' class="mb-5"></div>

    <div class="row">
        {{-- Location Name --}}
        <div class="col-md-6 mb-3 mt-3">
            <input type="text" class="form-control" id="location_name" name="location" placeholder="The City Of..." required>
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

<script>
// Long and Lat
let long = $('#longitude');
let lat = $('#latitude');

// Controll Map View
let map = L.map('map', {
    center: [41.505, -0.09],
    zoom: 15
});

// Make sure Map is Not Grey
L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map);

// Make Pop up Appear
var popup = L.popup();

// Popup Function
onMapClick = (e) => {
    popup
        .setLatLng(e.latlng)
        .setContent("Lokasi Terpilih, silakan berikan nama")
        .openOn(map);

    // Change Value
    long.val(e.latlng.lng);
    lat.val(e.latlng.lat);
}

// Listener
map.on('click', onMapClick);
</script>

@endsection

@endsection