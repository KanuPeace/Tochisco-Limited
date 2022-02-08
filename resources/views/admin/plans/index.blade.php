@extends("dashboards.admin.layouts.app")
@section('content')

<div class="statbox widget box box-shadow mt-5">
    <div class="widget-header">
        <div class="row">
            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                <h4>Plans</h4>

                <span class="fr">
                    <a href="{{ route('admin.plans.create') }}" class="btn btn-primary btn-sm">New Plan</a>
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
                    <th>Price ($)</th>
                    <th>Duration (Days)</th>
                    <th>Features</th>
                    <th>Is Active</th>
                    <th>Created At</th>
                    <th>Actions</th>
                </thead>
                <tbody>
                    @foreach ($plans as $plan)
                    <tr>
                        <td>{{ $sn++ }}</td>
                        <td>{{ $plan->name }}</td>
                        <td>{{ $plan->price }}</td>
                        <td>{{ $plan->duration }}</td>
                        <td>
                            <button class="btn btn-outline-success mt-3" type="button" data-toggle="modal" data-target="#planFeaturesList_{{ $plan->id }}">
                                View {{count($plan->getFeatures())}}
                            </button>
                        </td>
                        <td>{{ $plan->is_active }}</td>
                        <td>{{ $plan->created_at }}</td>
                        <td>
                            <a href="{{ route('admin.plans.edit' , $plan->id ) }}" class="">
                                <i data-feather="edit-2" class="text-info"></i></a>
                            </a>

                            <form action="{{ route('admin.plans.destroy', $plan->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" data-feather="trash-2" class="text-danger" onClick="$(this).parent().trigger('submit')"></button>
                            </form>

                        </td>
                    </tr>
                    @include("dashboards.admin.plans.modals.features" , ["plan" => $plan])
                    @endforeach
                </tbody>
            </table>
            {!! $plans->links('pagination::bootstrap-4') !!}
        </div>
    </div>
</div>

@endsection