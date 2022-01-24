<div class="modal fade" id="voteForContestant_{{$contestant->id}}" tabindex="-1" role="dialog" aria-labelledby="voteForContestant_{{$contestant->id}}" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route("user.contest.vote") }}" method="POST"> @csrf
                <input type="hidden" name="contestant_id" value="{{$contestant->id}}" >
            <div class="modal-body">

                <div class="">
                    <b>Contestant Name: </b> {{ $contestant->user->names() }}
                </div>
                <div class="mt-2 mb-3">
                    <b class="text-danger">Note: </b> Each vote costs {{format_money($contest->voting_fee ,2)}}
                </div>
                <div class="form-group">
                    <select class="form-control" required name="votes">
                        <option value="" disabled selected>Select Number of Votes</option>
                       @for ($i = 1; $i <= 10; $i++)
                       <option value="{{$i}}">{{ $i }} {{ $i == 1 ? "Vote" : "Votes" }}</ option>
                       @endfor
                    </select>
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-lg " data-dismiss="modal"><i class="flaticon-cancel-12"></i> Cancel</button>
                <button type="submit" class="btn btn-success btn-lg">Proceed with Vote</button>
            </div>
        </form>
        </div>
    </div>
</div>
