@extends("dashboards.user.layout.app")
@section('content')


    <div class="container scrollable-area">
        <div class="head">
            <h4>Referrals</h4>
        </div>
        <div class="content-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Name</th>
                        <th>Bonus</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        @foreach ($referrals as $referral)
                            <tr>
                                <td>{{ $referral->user->names() }}</td>
                                <td>{{ format_money($referral->bonus) }}</td>
                                <td> {{ date('Y-m-d', strtotime($referral->created_at)) }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
