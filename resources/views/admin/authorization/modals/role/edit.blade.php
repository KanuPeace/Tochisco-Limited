<div class="modal fade" id="editRoleModal_{{ $role->id }}" tabindex="-1" role="dialog" aria-labelledby="addNewRoleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route("admin.authorization.roles.update" , $role->id) }}" method="POST"> @csrf
            @method("Put")
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <input class="form-control" value="{{ str_replace("_" , " " , $role->name) }}" required name="name" placeholder="Enter role name..."  />
            </div>
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
        </form>
        </div>
    </div>
</div>
