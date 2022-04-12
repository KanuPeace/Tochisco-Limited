@extends("admin.layouts.app")
@section('content')
    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Vendors</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th class="">S/N</th>
                                <th class="">User Name</th>
                                <th class="">Business Name</th>
                                <th class="">Logo</th>
                                <th class="">Bought</th>
                                <th class="">Sold</th>
                                <th class="">UnSold</th>
                                <th class="">Status</th>
                                <th class=""></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $vendor)
                            @php
                                $statusColor = "";
                                $status = $vendor->status;
                                if($status == "Pending"){
                                    $statusColor = "text-info";
                                }
                                if($status == "Approved"){
                                    $statusColor = "text-success";
                                }
                                if($status == "Suspended"){
                                    $statusColor = "text-danger";
                                }

                            @endphp
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $vendor->user_id) }}"
                                            class="text-primary">
                                            {{ optional($vendor->user)->names() }}
                                        </a>
                                    </td>
                                    <td>{{ $vendor->business_name }}</td>
                                    <td>
                                       <a href="{{ $vendor->logoUrl() }}" target="_blank">
                                        <img src="{{ $vendor->logoUrl() }}" width="50" alt="">
                                       </a>
                                    </td>
                                    <td>{{ $vendor->coupons_bought }}</td>
                                    <td>{{ $vendor->coupons_sold }}</td>
                                    <td>{{ $vendor->coupons_unsold }}</td>
                                    <td class="{{ $statusColor }}">{{ $vendor->status }}</td>
                                    <td>

                                        <ul class="table-controls">
                                            <li class="mb-3">
                                                <div class="dropdown">
                                                    <button class="btn dropdown-toggle btn-sm" type="button" id="dropdownMenuButton"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        Change Status
                                                    </button>
                                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                        @foreach (['Pending', 'Approved' , 'Suspended'] as $status)
                                                            <a class="dropdown-item" onclick="return confirm('Are you sure of the action?')"
                                                                href="{{ route('admin.vendor_status', ['id' => $vendor->id, 'status' => $status]) }}">
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
                    {!! $vendors->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
