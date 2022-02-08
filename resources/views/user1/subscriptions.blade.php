@extends("dashboards.user.layout.app")
@section('content')


    <div class="container scrollable-area">
        <div class="head">
            <h4>Subscriptions</h4>
        </div>
        <div class="content-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Plan</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Paid On</th>
                        <th>Expires At</th>
                        <th>Status</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $subscription)
                            <tr>
                                <td>{{ $subscription->plan_name }}</td>
                                <td>{{ $subscription->payment_method }}</td>
                                <td>{{ format_money($subscription->price) }}</td>
                                <td>{{ date('Y-m-d', strtotime($subscription->paid_on)) }}</td>
                                <td>{{ date('Y-m-d', strtotime($subscription->expires_at)) }}</td>
                                <td>{{ $subscription->is_active ? "Active" : "Inactive" }}</td>
                                <td>{{ date('Y-m-d', strtotime($subscription->created_at)) }}</td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {!! $subscriptions->links("pagination::bootstrap-4")!!}

            </div>
        </div>
    </div>

@endsection
