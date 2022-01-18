<div class="modal fade" id="editPermissionModal_{{ $permission->id }}" tabindex="-1" role="dialog"
    aria-labelledby="editPermissionModal_{{ $permission->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('admin.authorization.permissions.update', $permission->id) }}" method="POST">
                @csrf
                @method("Put")
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Permission</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group ">
                        <label for="">Permission Name <span class="required">*</span></label>
                        <input class="form-control" value="{{ str_replace('_', ' ', $permission->name) }}" required
                            name="name" placeholder="Enter permission name..." />
                    </div>

                    <div class="form-group ">
                        <label for="">Type <span class="required">*</span></label>
                        <select name="guard_name" class="form-control" id="" required>
                            <option value="" disabled selected>Select Option</option>
                            @foreach ($guards as $key => $value)
                                <option value="{{ $key }}"
                                    {{ $key == $permission->guard_name ? 'selected' : '' }}>
                                    {{ $value }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
    </div>
</div>
