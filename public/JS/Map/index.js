initial = (lat, long) => {

    // Controll Map View
    let map = L.map('map', {
        center: [lat, long],
        zoom: 15
    });
    
    // Make sure Map is Not Grey
    L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    }).addTo(map);
    
}

$(document).ready(function(){

    // Button
    var button_detail = '.detail_button';
    var button_delete = '.delete_button';

    // Fetching Data to form Detail
    $(button_detail).on('click', function(event){
        event.preventDefault();

        var url = $(this).attr('data-action');

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
                initial(response.long, response.lat)
            },
            error: function(response) {
                console.log(response)
            }
        });
    });

    // Fetching Data to form Delete
    $(button_delete).on('click', function(event){
        event.preventDefault();

        var url = $(this).attr('data-action');

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

});