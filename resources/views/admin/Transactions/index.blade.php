@extends("dashboards.admin.layouts.app",  ["meta_title" => "Transaction"])
@section('content')
    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Transactions</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th class="">S/N</th>
                                <th class="">User</th>
                                <th class="">Referrence</th>
                                <th class="">Amount</th>
                                <th class="">Fee</th>
                                <th class="">Total</th>
                                <th class="">Type</th>
                                <th class="">Description</th>
                                <th class="">Status</th>
                                <th class="">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($transactions as $transaction)
                            @php
                                $statusColor = "";
                                $status = $transaction->status;
                                if($status == "Pending"){
                                    $statusColor = "text-info";
                                }
                                if($status == "Completed"){
                                    $statusColor = "text-success";
                                }

                            @endphp
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $transaction->user_id) }}"
                                            class="text-primary">
                                            {{ $transaction->user->names() }}
                                        </a>
                                    </td>
                                    <td>{{ $transaction->reference }}</td>
                                    <td>{{ format_money($transaction->amount) }}</td>
                                    <td>{{ format_money($transaction->fee) }}</td>
                                    <td>{{ format_money($transaction->total) }}</td>
                                    <td>{{ $transaction->type }}</td>
                                    <td>{{ $transaction->description }}</td>
                                    <td class="{{ $statusColor }}">{{ $transaction->status }}</td>
                                    <td>{{ $transaction->created_at }}</td>
                                    <td>

                                        <ul class="table-controls">
                                            <li class="mb-3">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Change Status
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @foreach (['Pending', 'Completed'] as $status)
                                                            <a class="dropdown-item" onclick="return confirm('Are you sure of the action?')"
                                                                href="{{ route('admin.transaction_status', ['id' => $transaction->id, 'status' => $status]) }}">
                                                                Mark as {{ ucfirst($status) }}
                                                            </a>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $transactions->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
