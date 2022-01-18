<style>
    .plan-footer{
        position: absolute;
        bottom: 0px;
        padding: 10px;
        width: 100%;
    }
</style>
    <div class="card bg-color-grey" style="height: 350px">
        <div class="card-content">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <h3>{{ $plan->name }}</h3>
                        <div>
                            <ul>
                                @foreach ($plan->getFeatures() as $item)
                                    <li>{{ $item }}</li>
                                @endforeach
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <div class="plan-footer">
                <div >
                    <b class="text-primary mr-2">Price:</b> {{ $plan->price() }}
                 </div>
                 <div class="text-center mt-2">
                     <a href="{{ route("user.plans.info" , $plan->id) }}" class="text-center axil-button button-rounded btn-primary"
                         style="width: 150px">
                         View
                 </a>
                 </div>
            </div>
        </div>
    </div>
