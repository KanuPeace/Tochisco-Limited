@extends("dashboards.user.layout.app")
@section('content')

    <div class="container scrollable-area">
        <div class="head">
            <h4>{{ $plan->name }} Plan Information</h4>
        </div>
        <div class="content-body">
            You get: <br>

            <div>
                <ul>
                    @foreach ($plan->getFeatures() as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                </ul>
            </div>

            <form action="{{ route("user.plans.subscribe" , $plan->id) }}" method="post">@csrf
                <div class="form-row">
                    <div class="col-12">
                        <button type="submit" class="axil-button button-rounded btn-primary text-center"
                            style="width: 150px">
                            Subscribe
                        </button>
                    </div>
                </div>

            </form>

        </div>
    </div>


@endsection
