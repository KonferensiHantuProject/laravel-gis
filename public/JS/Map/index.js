initial = (type, lat, long) => {

    // Controll Map View
    let map = L.map('map' + type, {
        center: [lat, long],
        zoom: 15
    });
    
    // Make sure Map is Not Grey
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    
    // Making Sure it is update
    if(type == '_update')
    {
        // Long and Lat
        let long = $('#longitude');
        let lat = $('#latitude');
        
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
    }
}

$(document).ready(function(){

    // Button
    let button_detail = '.detail_button';
    let button_delete = '.delete_button';
    let button_update = '.button_update';

    // Fetching Data to form Detail
    $(button_detail).on('click', function(event){
        event.preventDefault();

        let url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                // Showing Data
                $('#location_name').val(response.location);

                let container = L.DomUtil.get('map');

                // Clean the Container
                if(container != null){
                    container._leaflet_id = null;
                }

                // Initialize Map
                initial('', response.long, response.lat)
            },
            error: function(response) {
                console.log(response)
            }
        });
    });

    // Fetching Data to form Delete
    $(button_delete).on('click', function(event){
        event.preventDefault();

        let url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                // Change Data
                $('#id_delete').val(response.id);
            },
            error: function(response) {
                console.log(response)
            }
        });
    });

    // Fetching Data to form Update
    $(button_update).on('click', function(event){
        event.preventDefault();

        let url = $(this).attr('data-action');

        $.ajax({
            url: url,
            method: 'GET',
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success:function(response)
            {
                console.log(response);

                // Change Data
                $('#id_update').val(response.id);
                $('#longitude').val(response.long);
                $('#latitude').val(response.lat);

                // Showing Data
                $('#location_update').val(response.location);

                let container = L.DomUtil.get('map_update');

                // Clean the Container
                if(container != null){
                    container._leaflet_id = null;
                }

                // Initialize Map
                initial('_update', response.long, response.lat)
            },
            error: function(response) {
                console.log(response)
            }
        });
    });

});