<div class="modal fade" id="addNewPermissionModal" tabindex="-1" role="dialog" aria-labelledby="addNewPermissionModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route("admin.authorization.permissions.store") }}" method="POST"> @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Permission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <input class="form-control" required name="name" placeholder="Enter permission name..."  />
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
