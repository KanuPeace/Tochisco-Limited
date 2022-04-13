<div class="modal fade" id="addNewBenefitModal" tabindex="-1" role="dialog" aria-labelledby="addNewBenefitModal" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route("admin.membership-benefits.store") }}" method="POST"> @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New Benefit</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">

                    <input type="hidden" value="{{$plan->id}}" name="plan_id" required>
                    <div class="form-group">
                        <label for="">Title <span class="required">*</span></label>
                        <input class="form-control" type="text" required name="title" placeholder="Title">
                    </div>

                    <div class="form-group">
                        <label for="">Body<span class="required">*</span></label>
                        <textarea rows="5" class="form-control" required name="body" placeholder="Describe this benefit"></textarea>
                    </div>



                    <div class="form-group">
                        <label for="">Is Active <span class="required">*</span></label>
                        <select name="is_active" class="form-control" id="" required>
                            <option value="" disabled selected>Select Option</option>
                            @foreach ($boolOptions as $key => $value)
                            <option value="{{ $key }}">
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
