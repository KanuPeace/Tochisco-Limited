@extends("admin.layouts.app")
@section('content')

<div class="statbox widget box box-shadow mt-5">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4> MemberShip Plans</h4>

                <span class="fr">
                    <a href="{{ route('admin.membership-plans.create') }}" class="btn btn-primary btn-sm">New Plan</a>
                </span>
            </div>
        </div>
    </div>
    <div class="widget-content widget-content-area">
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                <thead>
                    <th>Sn</th>
                    <th>Name</th>
                    <th>Logo</th>
                    <th>Price</th>
                    <th>Discount</th>
                    <th>Elite Points</th>
                    <th>Duration</th>
                    <th>Is Active</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>{{ $plan->name }}</td>
                        <td>
                            <img src="{{ $plan->logoUrl() }}" alt="" class="img-fluid" width="100">
                        </td>
                        <td>{{ format_money($plan->price) }}</td>
                        <td>{{ $plan->discount }}</td>
                        <td>{{ $plan->elite_points }}</td>
                        <td>{{ $plan->duration }}</td>
                        <td>{{ $plan->is_active ? "Yes" : "No" }}</td>
                        <td>{{ $plan->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.membership-plans.edit' , $plan->id ) }}" class="">
                                <i data-feather="edit-2" class="text-info"></i></a>
                            </a>

                            <form action="{{ route('admin.membership-plans.destroy', $plan->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-feather="trash-2" class="text-danger" onClick="$(this).parent().trigger('submit')"></button>
                            </form>

                        </td>
                    </tr>
                    @include("dashboards.admin.membership_plans.modals.features" , ["plan" => $plan])
                    @endforeach
                </tbody>
            </table>
            {!! $plans->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>

@endsection
