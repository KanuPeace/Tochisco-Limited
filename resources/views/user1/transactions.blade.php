@extends("dashboards.user.layout.app")
@section('content')


    <div class="container scrollable-area">
        <div class="head">
            <h4>Transactions</h4>
        </div>
        <div class="content-body">

            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <th>Description</th>
                        <th>Type</th>
                        <th>Amount</th>
                        <th>Fee</th>
                        <th>Reference</th>
                        <th>Status</th>
                        <th>Date</th>
                    </thead>
                    <tbody>
                        @foreach ($transactions as $transaction)
                            <tr>
                                <td>{{ $transaction->description }}</td>
                                <td>{{ $transaction->type }}</td>
                                <td>{{ format_money($transaction->amount) }}</td>
                                <td>{{ format_money($transaction->fee) }}</td>
                                <td>{{ $transaction->reference }}</td>
                                <td>{{ $transaction->status }}</td>
                                <td>
                                    <small>{{ date('Y-m-d', strtotime($transaction->created_at)) }}</small>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>
            {!! $transactions->links("pagination::bootstrap-4")!!}

        </div>
    </div>

@endsection
