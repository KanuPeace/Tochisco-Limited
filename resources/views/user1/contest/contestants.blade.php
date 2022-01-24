@extends("dashboards.user.layout.app")
@section('content')



<div class="container scrollable-area">
    <div class="head">
        <h4> Contestants for {{ $contest->title }}</h4>
    </div>
    <div class="content-body">

        <div class="mt-5">

            <form action="{{ route("user.contest.contestants")}}" method="get" class="form-row">
                <div class="col-md-8 mb-2">
                    <input type="hidden" value="{{$contest->reference}}" name="contest_reference" class="form-control">
                    <input type="text" value="{{ request()->query("contestant_reference")}}" name="contestant_reference" class="form-control" placeholder="Enter contestant reference">
                </div>
                <div class="col-md-2 mb-5">
                    <button class="btn btn-success btn-sm">Filter</button>
                </div>
            </form>

            <div class="row text-left">
                @foreach ($contestants as $contestant)
                <div class="col-md-6">
                    <div class="card mt-3">
                        <div class="card-header">
                            <b>{{$contestant->reference}}</b>
                        </div>
                        <div class="card-body">
                            <div class="d-flex">
                                    <img src="{{ $contestant->user->avatarUrl() }}" alt="avatar" class="img-fluid round" width="30%">
                                <div class="pl-3">
                                    <div class="mt-2 text-primary">{{$contestant->user->names()}}</div>
                                    <div class="">
                                        <small class="">
                                            <b>Total Points: </b> {{ number_format($contestant->total_points, 2)}}
                                        </small>
                                        <div class="">
                                            <a class="badge badge-pill badge-primary pl-5 pt-2 pb-2 pr-5" data-toggle="modal" data-target="#voteForContestant_{{$contestant->id}}">Vote</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @include("dashboards.user.contest.modals.vote")
                @endforeach
            </div>
            {!! $contestants->links('pagination::bootstrap-4') !!}

        </div>
    </div>
</div>

@endsection
