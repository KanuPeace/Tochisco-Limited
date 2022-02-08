@extends("dashboards.user.layout.app")
@section('content')



<div class="container scrollable-area">
    <div class="head">
        <h4>FlairWorld Contest 1.0</h4>
    </div>
    <div class="content-body">

        <div class="mt-5">
            <p class="mb-4">
                Hello {{ $user->first_name }}, <br>
                Welcome to Flairworlds monthly user Contest.
            </p>

            <div class="alert alert-info mt-4">
                <a href="{{ route("user.contest.contestants" , ["contest_reference" => $contest->reference]) }}" class="">See all Contestants</a>
            </div>

            <div class="row text-left">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header tex">
                            Your Statistics
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-3">
                                    <img src="{{ $user->avatarUrl() }}" alt="avatar" class="img-fluid round">
                                </div>
                                <div class="col-md-9">
                                    <h3 class="mt-5 mb-3 text-primary">{{$user->names()}}</h3>
                                    <div class="">
                                        <b>Total Votes: </b> {{$contestant->total_votes}}
                                    </div>
                                    <div class="">
                                        <b>Total Points: </b> {{$contestant->total_points}}
                                    </div>
                                    <div class="">
                                        <b>Stage: </b> {{$contestant->stage}}
                                    </div>
                                    <div class="">
                                        @php
                                        $statusColor = "";
                                        $status = $contestant->status;
                                        if($status == "Evicted"){
                                        $statusColor = "text-danger";
                                        }
                                        if($status == "Active"){
                                        $statusColor = "text-success";
                                        }

                                        @endphp
                                        <b>Status: </b> <span class="{{ $statusColor }}">{{ $contestant->status }}</span>
                                    </div>
                                    {{-- <div class="">
                                        <b>Rank: </b> 10/1000
                                    </div> --}}
                                    <div class="">
                                        Vote Link:
                                        <a href="javascript:;;" class="text-primary copy" data-content="{{ route("user.contest.contestants"
                                        , ["contest_reference" => $contest->reference ,"contestant_reference" => $contestant->reference])}}">
                                            Click to copy
                                        </a>

                                    </div>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>

            <div class="card mt-5">
                <div class="card-header tex">
                    Recent Votes
                </div>
                <div class="card-body">
                    <div class="table-responsive mt-5">
                        <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                            <thead>
                                <tr>
                                    <th class="">S/N</th>
                                    <th class="">User</th>
                                    <th class="">Votes</th>
                                    <th class="">Created At</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $sn = $votes->firstItem();
                                @endphp
                                @foreach ($votes as $vote)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{$vote->user->names()}}</td>
                                    <td>{{ $vote->votes }}</td>
                                    <td>{{ $vote->created_at }}</td>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {!! $votes->links('pagination::bootstrap-4') !!}
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

@endsection
