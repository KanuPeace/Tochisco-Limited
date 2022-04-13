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

                <form action="{{ route('admin.membership-plans.update' , $plan->id) }}" method="post" enctype="multipart/form-data"
                    onsubmit="return confirm('Are you sure you want to make changes to this plan?')">
                    @csrf
                    @method("put")

                    <div class="form-row mb-3">

                        <div class="form-group col-md-3">
                            <label for="">Name <span class="required">*</span></label>
                            <input class="form-control" type="text" required name="name" placeholder="Pro..."
                                value="{{ $plan->name }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Logo <span class="required">*</span></label>
                            <input class="form-control" type="file" name="logo_id">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">Price (N) <span class="required">*</span></label>
                            <input class="form-control" type="number" required name="price" placeholder="In naira"
                                value="{{ $plan->price }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Discount (%)<span class="required">*</span></label>
                            <input class="form-control" type="number" required name="discount" placeholder="In percentage "
                                value="{{ $plan->discount }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Elite Points <span class="required">*</span></label>
                            <input class="form-control" type="number" required name="elite_points" placeholder="In points "
                                value="{{ $plan->elite_points }}">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Duration (days)<span class="required">*</span></label>
                            <input class="form-control" type="number" required name="duration" placeholder="In days "
                                value="{{ $plan->duration }}">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">Is Active <span class="required">*</span></label>
                            <select name="is_active" class="form-control" id="" required>
                                <option value="" disabled selected>Select Option</option>
                                @foreach ($boolOptions as $key => $value)
                                    <option value="{{ $key }}" {{ $key == $plan->is_active ? 'selected' : '' }}>
                                        {{ $value }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-success mt-3" type="submit">
                                Submit
                            </button>
                        </div>

                    </div>
                </form>
                <h4 mt-5>Features / Benefits

                    <span class="fr">
                        <a href="#" data-toggle="modal" data-target="#addNewBenefitModal" class="btn btn-primary btn-sm">New Benefit</a>
                    </span>
                </h4>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mt-4">
                        <thead>
                            <tr>
                                <th class="">S/N</th>
                                <th class="">Title</th>
                                <th class="">Body</th>
                                <th class="">Is Active</th>
                                <th class="">Created At</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sn = 1;
                            @endphp
                            @foreach ($plan->benefits as $benefit)

                            <tr>
                                <td>{{ $sn++ }}</td>
                                <td>{{ $benefit->title }}</td>
                                <td>{{ $benefit->body }}</td>
                                <td>{{ $benefit->is_active ? "Yes" : "No" }}</td>
                                <td>{{ $benefit->created_at }}</td>
                                <td>

                                    <form action="{{ route('admin.membership-benefits.destroy', $benefit->id) }}" method="post" onsubmit="return confirm('Are you sure you want to delete this record?')">
                                        @csrf
                                        @method('DELETE')

                                        <a href="#" data-toggle="modal" data-target="#editBenefitModal_{{ $benefit->id }}">
                                            <i data-feather="edit-2" class="text-info"></i></a>
                                        </a>

                                        <button type="submit" data-feather="trash-2" class="text-danger" onClick="$(this).parent().trigger('submit')"></button>
                                    </form>


                                </td>
                            </tr>
                            @include("dashboards.admin.membership_plans.modals.benefits.edit")

                            @endforeach
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div>
    @include("dashboards.admin.membership_plans.modals.benefits.add")

            </div>
        </div>
    </div>

@endsection
