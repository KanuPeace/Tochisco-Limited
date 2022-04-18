<div class="modal fade" id="addNewRoleModal" tabindex="-1" role="dialog" aria-labelledby="addNewRoleModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route("admin.authorization.roles.store") }}" method="POST"> @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generate Codes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Amount ($)</label>
                    <input class="form-control" required name="amount" placeholder="1000" type="number"  />
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input class="form-control" required name="quantity" placeholder="10"  type="number" />
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
