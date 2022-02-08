@extends("dashboards.admin.layouts.app")
@section('content')

    <div class="statbox widget box box-shadow mt-5">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Subscriptions</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <th>User</th>
                        <th>Plan</th>
                        <th>Payment Method</th>
                        <th>Amount</th>
                        <th>Paid On</th>
                        <th>Expires At</th>
                        <th>Status</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($subscriptions as $subscription)
                            <tr>
                                <td>
                                    <a href="{{ route("admin.users.show" , $subscription->user_id) }}" class="text-primary">
                                        {{ optional($subscription->user)->names() }}
                                    </a>
                                </td>
                                <td>{{ $subscription->plan_name }}</td>
                                <td>{{ $subscription->payment_method }}</td>
                                <td>{{ format_money($subscription->price) }}</td>
                                <td>{{ date('Y-m-d', strtotime($subscription->paid_on)) }}</td>
                                <td>{{ date('Y-m-d', strtotime($subscription->expires_at)) }}</td>
                                <td>{{ $subscription->is_active ? 'Active' : 'Inactive' }}</td>
                                <td>{{ date('Y-m-d', strtotime($subscription->created_at)) }}</td>
                                <td></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {!! $subscriptions->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>

@endsection
