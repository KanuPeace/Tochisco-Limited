<div class="modal fade" id="planFeaturesList_{{ $plan->id }}" tabindex="-1" role="dialog"
    aria-labelledby="planFeaturesList_{{ $plan->id }}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Features</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            {{-- <div class="modal-body">
                <ul>
                    @foreach ($plan->getFeatures() as $item)
                        <li class="mb-3">
                            <p><b>{{ str_replace('_', ' ', $item) }}</b></p>
                        </li>
                    @endforeach
                </ul>
            </div> --}}
            <div class="modal-footer">
                <button class="btn" data-dismiss="modal"> Close</button>
            </div>
        </div>
    </div>
</div>
