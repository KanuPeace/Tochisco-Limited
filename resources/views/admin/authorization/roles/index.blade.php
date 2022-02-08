@extends("dashboards.admin.layouts.app")
@section('content')
    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Authorization - Roles</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <button class="btn btn-success mb-3" type="button" data-toggle="modal" data-target="#addNewRoleModal">
                    New Role
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th class="">S/N</th>
                                <th class="">Name</th>
                                <th class="">Permissons</th>
                                <th class="">Created At</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roles as $role)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ str_replace("_" , " " , $role->name) }}</td>
                                    <td>{{ $role->permissions->count() }}</td>
                                    <td>{{ $role->created_at }}</td>
                                    <td>
                                        <form action="{{ route('admin.authorization.roles.destroy', $role->id) }}"
                                            method="post"
                                            onsubmit="return confirm('Are you sure you want to delete this record?')">
                                            @method("delete")
                                            @csrf
                                            <a class="btn btn-dark mt-3" href="{{ route("admin.authorization.roles.show" , $role->id) }}" >
                                                Permissions
                                            </a>
                                            <button class="btn btn-info mt-3" type="button" data-toggle="modal"
                                                data-target="#editRoleModal_{{ $role->id }}">
                                                <i data-feather="edit-2"></i>
                                            </button>
                                            <button class="btn btn-danger mt-3" type="submit">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @include("dashboards.admin.authorization.modals.role.edit" , ["role" => $role])
                            @endforeach
                        </tbody>
                    </table>
                    {!! $roles->links('pagination::bootstrap-4') !!}
                </div>

                @include("dashboards.admin.authorization.modals.role.add")
            </div>
        </div>
    </div>
@endsection
