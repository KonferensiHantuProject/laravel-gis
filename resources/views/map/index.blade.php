@extends('layouts.main')

@section('container')

<style>
    #map { 
        height: 450px;
        margin-top: 25px; 
    }
</style>

<!-- Leaflet CSS -->
<link href="{{ asset('leaflet/leaflet.css') }}" rel="stylesheet">

<h1 class="text-center">Map</h1>

{{-- Place For the Map --}}
<div id='map'></div>

<!-- Leaflet Js -->
<script src="{{ asset('leaflet/leaflet.js') }}"></script>

<script>

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
        .setContent("Anda Mengklik Peta " + e.latlng.toString())
        .openOn(map);
}

// Listener
map.on('click', onMapClick);
</script>

@endsection