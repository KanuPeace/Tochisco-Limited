<div class="modal fade" id="generateCodes" tabindex="-1" role="dialog" aria-labelledby="generateCodes" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route("user.vendor.generate_codes") }}" method="POST"> @csrf
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Generate Codes</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="">Plan</label>
                    <select class="form-control" required name="price">
                        <option value="" disabled selected>Select Plan</option>
                        @foreach ($plans as $plan)
                            <option value="{{$plan->price}}">{{ $plan->name}} - {{format_money($plan->price)}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="">Quantity</label>
                    <input class="form-control" required name="quantity" placeholder="10"  type="number" />
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg " data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                <button type="submit" class="btn btn-success btn-lg">Generate</button>
            </div>
        </form>
        </div>
    </div>
</div>
