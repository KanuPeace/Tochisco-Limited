@extends("dashboards.admin.layouts.app")
@section('content')
    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Edit {{ $plan->name }} </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

                <form action="{{ route('admin.plans.create') }}" method="post"
                    onsubmit="return confirm('Are you sure you want to assign these features/permissions to this plan?')">
                    @csrf
                    @method("put")

                    <div class="form-row mb-3">

                        <div class="form-group col-md-3">
                            <label for="">Name <span class="required">*</span></label>
                            <input class="form-control" type="text" required name="name" placeholder="Pro..."
                                value="{{ $plan->name }}">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">Price ($) <span class="required">*</span></label>
                            <input class="form-control" type="number" required name="price" placeholder="In dollars"
                                value="{{ $plan->price }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Duration (days)<span class="required">*</span></label>
                            <input class="form-control" type="number" required name="duration" placeholder="In days "
                                value="{{ $plan->duration }}">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">Is Published <span class="required">*</span></label>
                            <select name="is_active" class="form-control" id="" required>
                                <option value="" disabled selected>Select Option</option>
                                @foreach ($boolOptions as $key => $value)
                                    <option value="{{ $key }}" {{ $key == $plan->is_active ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <h4>Features / Permissions </h4>
                    <div class="table-responsive">
                        <table
                            class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                            <thead>
                                <tr>
                                    <th class="">S/N</th>
                                    <th class="">Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $sn = 1;
                                @endphp
                                @foreach ($permissions as $permission)

                                    <tr>
                                        <td>{{ $sn++ }}</td>
                                        <td>{{ str_replace('_', ' ', $permission->name) }}</td>
                                        <td>
                                            <input type="checkbox"
                                                {{ in_array($permission->name, $planFeatures) ? 'checked' : '' }}
                                                name="checked_permissions[]" value="{{ $permission->id }}"
                                                class="form-control">
                                        </td>
                                   </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <button class="btn btn-success mt-3" type="submit">
                        Submit
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
