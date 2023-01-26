<style>
    #map_update { 
        height: 450px;
        width: 450px;
        margin-top: 25px; 
    }
</style>

<div class="modal" id="update-map-modal">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 10px;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-dark">Update</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="update-map-form" action="/map/location" method="post">
                @method('put')
                @csrf
                
                {{-- Hidden input --}}
                <input type="hidden" class="form-control" id="id_update" name="id">
                <input type="hidden" class="form-control" id="longitude" name="longitude">
                <input type="hidden" class="form-control" id="latitude" name="latitude">

                {{-- Center Map --}}
                <div class="d-flex justify-content-center">
                    <div id='map_update'></div>
                </div>

                {{-- Name --}}
                <div class="row mt-4">
                    <div class="col-md-12">
                        <input type="text" class="form-control" id="location_update" name="location" required>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Yes</button>
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">No</button>
                </div>
            </form>
        </div>
    </div>
</div>