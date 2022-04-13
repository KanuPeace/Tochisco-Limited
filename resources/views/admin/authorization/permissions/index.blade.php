@extends("admin.layouts.app")
@section('content')
    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Authorization - Permissions</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <button class="btn btn-success mb-3" type="button" data-toggle="modal" data-target="#addNewPermissionModal">
                    New Permission
                </button>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th class="">S/N</th>
                                <th class="">Name</th>
                                <th class="">Type</th>
                                {{-- <th class="">Role</th> --}}
                                <th class="">Created At</th>
                                <th class="">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ str_replace("_" , " " , $permission->name) }}</td>
                                    <td>{{ $guards[$permission->guard_name] ?? "N/A" }}</td>
                                    {{-- <td>0</td> --}}
                                    <td>{{ $permission->created_at }}</td>
                                    <td>
                                        <form action="{{ route('admin.authorization.permissions.destroy', $permission->id) }}"
                                            method="post"
                                            onsubmit="return confirm('Are you sure you want to delete this record?')">
                                            @method("delete")
                                            @csrf
                                            {{-- <a class="btn btn-dark mt-3" href="#" >
                                                Permissions
                                            </a> --}}
                                            <button class="btn btn-info mt-3" type="button" data-toggle="modal"
                                                data-target="#editPermissionModal_{{ $permission->id }}">
                                                <i data-feather="edit-2"></i>
                                            </button>
                                            <button class="btn btn-danger mt-3" type="submit">
                                                <i data-feather="trash-2"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @include("admin.authorization.modals.permissions.edit" , ["permission" => $permission , "guards" => $guards])
                            @endforeach
                        </tbody>
                    </table>
                    {!! $permissions->links('pagination::bootstrap-4') !!}
                </div>

                @include("admin.authorization.modals.permissions.add" , ["guards" => $guards])
            </div>
        </div>
    </div>
@endsection
