@extends("dashboards.user.layout.app")
@section('content')

    <div class="container scrollable-area">
        <div class="head">
            <h4>Subscription Plans</h4>
        </div>
        <div class="content-body">
            <div class="form-row ">
                @foreach ($plans as $plan)
                    <div class="col-md-4 mb-3">
                        @include("dashboards.user.fragments.single_plan" , ["plan" => $plan])
                    </div>
                @endforeach
            </div>
        </div>
    </div>


@endsection
