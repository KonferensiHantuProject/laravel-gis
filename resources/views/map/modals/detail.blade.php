<style>
    #map { 
        height: 450px;
        width: 450px;
        margin-top: 25px; 
    }
</style>

<div class="modal" id="detail-map-modal">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 10px;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-dark">Detail</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            {{-- Title --}}
            <h1 class="text-center text-dark">Map</h1>

            {{-- Center Map --}}
            <div class="d-flex justify-content-center">
                <div id='map'></div>
            </div>

            <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">
                Close
            </button>
        </div>
    </div>
</div>

@section('script')
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