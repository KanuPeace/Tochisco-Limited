@extends("dashboards.admin.layouts.app")
@section('content')
    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>{{ ucfirst(str_replace("_" , " " , $role->name)) }} Permissions</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <div class="table-responsive">
                    <form action="{{ route("admin.authorization.roles.update_permissions" , $role->id) }}"
                        method="post"
                        onsubmit="return confirm('Are you sure you want to assign these permissions to this role?')">
                        @csrf
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th class="">S/N</th>
                                <th class="">Name</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($permissions as $permission)

                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ str_replace("_" , " " , $permission->name) }}</td>
                                    <td>
                                        <input type="checkbox" {{ $permission->hasRole($role->id) ? "checked" : "" }} name="checked_permissions[]" value="{{ $permission->id }}" class="form-control">
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <button class="btn btn-success mt-3" type="submit">
                        Submit
                    </button>
                </form>

                </div>
            </div>
        </div>
    </div>
@endsection
