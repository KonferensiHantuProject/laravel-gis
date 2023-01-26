<div class="modal" id="delete-map-modal">
    <div class="modal-dialog">
        <div class="modal-content" style="padding: 10px;">

            <!-- Modal Header -->
            <div class="modal-header">
                <h4 class="modal-title text-dark">Delete</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>

            <form id="delete-map-form" action="/map/location" method="post">
                @method('delete')
                @csrf
                
                {{-- Hidden input --}}
                <input type="hidden" class="form-control" id="id_delete" name="id">

                {{-- Asking --}}
                <div class="mb-3 text-dark d-flex justify-content-center align-items-center mt-3">
                    <label for="name" class="form-label">Are You Sure?</label>
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