@extends("dashboards.admin.layouts.app")
@section('content')

    <div class="statbox widget box box-shadow mt-5">
        <div class="widget-header">
            <div class="row">
                <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                    <h4>Membership Subscriptions</h4>
                </div>
            </div>
        </div>
        <div class="m-2">
            <form action="{{ url()->current() }}" method="get" class="form-row">
                <div class="form-group col-auto">
                    <select name="search_by" id="" class="form-control">
                        <option value="" selected>Select Option</option>
                        @foreach ($searchByOptions as $key => $value)
                        <option value="{{$key}}" {{ request()->query("search_by") == $key ? "selected" : ""}}>{{$value}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="search" value="{{ request()->query("search")}}" placeholder="Search ....">
                </div>

                <div class="form-group col-auto">
                    <select name="plan_id" id="" class="form-control">
                        <option value="" selected>Select plan</option>
                        @foreach ($plans as $plan)
                        <option value="{{$plan->id}}" {{ request()->query("plan_id") == $plan->id ? "selected" : ""}}>{{$plan->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-auto">
                    <select name="status" id="" class="form-control">
                        <option value="" selected>Select Status</option>
                        @foreach ($statusOptions as $status)
                        <option value="{{$status}}" {{ request()->query("status") == $status ? "selected" : ""}}>{{$status}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-auto">
                    <input type="date" class="form-control" name="from" value="{{ request()->query("from")}}">
                </div>

                <div class="form-group col-auto">
                    <input type="date" class="form-control" name="to" value="{{ request()->query("to")}}">
                </div>

                <div class="form-group col-auto">
                    <button class="btn btn-sm btn-success">Filter</button>
                    <a href="{{ url()->current() }}" class="btn btn-sm btn-danger" type="reset">Reset</a>
                </div>
            </form>
        </div>
        <div class="widget-content widget-content-area">
            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                    <thead>
                        <th>User</th>
                        <th>Plan Name</th>
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
                                <td>{{ $subscription->plan->name }}</td>
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
