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

            {{-- Name --}}
            <div class="row mt-4">
                <div class="col-md-12">
                    <input type="text" class="form-control" id="location_name" readonly>
                </div>
            </div>

            <button type="button" class="btn btn-danger mt-3" data-bs-dismiss="modal">
                Close
            </button>
        </div>
    </div>
</div>