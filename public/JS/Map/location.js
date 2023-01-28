// Location
let loc = $('#location_name');
let invalild_loc = $('#invalid_location');
let valild_loc = $('#valid_location');

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
let popup = L.popup();

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

// Ajax Setup
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

// Fetching Data to form Detail
$(loc).on('keyup', function(event){
    // event.preventDefault();

    let url = $(this).attr('data-action');

    $.ajax({
        url: url,
        type: 'post',
        data: { location_name: loc.val() },
        dataType: 'JSON',
        success:function(response)
        {
            // Checking Response
            if(response.warning)
            {
                // Removing Valid Class
                if(loc.hasClass("is-valid")) loc.removeClass("is-valid");

                // Add Invalid Class
                loc.addClass("is-invalid");
                invalild_loc.html(response.warning);
            }else{
                // Removing Invalid Class
                if(loc.hasClass("is-invalid")) loc.removeClass("is-invalid");

                // Add Valid
                loc.addClass("is-valid");
                valild_loc.html(response.success);
            }

            console.log(response)
        },
        error: function(response) {
            console.log(response)
        }
    });
});