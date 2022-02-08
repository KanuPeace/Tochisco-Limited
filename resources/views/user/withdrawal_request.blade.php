@extends("dashboards.user.layout.app")
@section('content')


    <div class="container scrollable-area">
        <div class="head">
            <h4>Withdrawal Requests</h4>
        </div>
        <div class="content-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Bank Name</th>
                        <th>Account Name</th>
                        <th>Account No.</th>
                        <th>Status</th>
                        <th>Comment</th>
                        <th>Request Date</th>
                        <th>Confirmed At</th>
                    </thead>
                    <tbody>
                        @foreach ($withdrawals as $withdrawal)
                            <tr>
                                <td>{{ $withdrawal->reference }}</td>
                                <td>{{ format_money($withdrawal->amount) }}</td>
                                <td>{{ $withdrawal->bank_name }}</td>
                                <td>{{ $withdrawal->account_name }}</td>
                                <td>{{ $withdrawal->account_number }}</td>
                                <td>{{ $withdrawal->status }}</td>
                                <td>{{ $withdrawal->comment ?? 'N/A' }}</td>
                                <td>{{ date('Y-m-d', strtotime($withdrawal->request_date)) }}</td>
                                <td>{{ !empty(($key = $withdrawal->confirmation_date)) ? date('Y-m-d', strtotime($key)) : 'N/A' }}
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

        </div>
    </div>

@endsection
