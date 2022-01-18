@extends("dashboards.admin.layouts.app")
@section('content')

    <div class="statbox widget box box-shadow mt-5">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Withdrawals</h4>
                </div>
            </div>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <th>User</th>
                        <th>Reference</th>
                        <th>Amount</th>
                        <th>Bank Name</th>
                        <th>Account Name</th>
                        <th>Account No.</th>
                        <th>Status</th>
                        <th>Comment</th>
                        <th>Request Date</th>
                        <th>Confirmed At</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </thead>
                    <tbody>
                        @foreach ($withdrawals as $withdrawal)
                            <tr>
                                <td>
                                    <a href="{{ route('admin.users.show', $withdrawal->user_id) }}" class="text-primary">
                                        {{ optional($withdrawal->user)->names() }}
                                    </a>
                                </td>
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
                                <td>{{ date('Y-m-d', strtotime($withdrawal->created_at)) }}</td>
                                <td>

                                    <ul class="table-controls">
                                        <li class="mb-3">
                                            <div class="dropdown">
                                                <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    Change Status
                                                </button>
                                                <button class="btn btn-danger mt-3" type="button"  data-toggle="modal" data-target="#cancelRequest_{{ $withdrawal->id }}">
                                                    Reject
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @foreach (['Pending', 'Processing', 'Completed'] as $status)
                                                        <a class="dropdown-item" onclick="return confirm('Are you sure of the action?')"
                                                            href="{{ route('admin.withdrawal_status', ['id' => $withdrawal->id, 'status' => $status]) }}">
                                                            Mark as {{ ucfirst($status) }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                </td>
                            </tr>
                            <div class="modal fade" id="cancelRequest_{{ $withdrawal->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <form action="{{ route("admin.withdrawal_decline" , $withdrawal->id) }}" method="POST"> @csrf
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Decline Request #{{ $withdrawal->reference }}</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <i data-feather="x"></i>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <p class="text-danger">Please be as descriptive and polite as possible.</p>
                                            <textarea class="form-control" required name="comment" placeholder="Tell the user why you want to decline the withdrawal request..." id=""rows="5"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn" data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                                            <button type="submit" class="btn btn-primary">Save</button>
                                        </div>
                                    </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </tbody>
                </table>
                {!! $withdrawals->links('pagination::bootstrap-4') !!}
            </div>
        </div>
    </div>

@endsection
