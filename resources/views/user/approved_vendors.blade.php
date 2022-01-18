@extends("dashboards.user.layout.app")
@section('content')


    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Approved Vendors</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th class="">S/N</th>
                                <th class="">Logo</th>
                                <th class="">Business Name</th>
                                <th class="">Phone</th>
                                <th class="">Available</th>
                                <th class="">Sold</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendors as $vendor)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td class="text-center">
                                        <a href="{{ $vendor->logoUrl() }}" target="_blank">
                                            <img src="{{ $vendor->logoUrl() }}" width="50" alt="">
                                        </a>
                                    </td>
                                    <td>{{ $vendor->business_name }}</td>
                                    <td>{{ $vendor->phone }}</td>
                                    <td>
                                            @foreach ($plans as $plan)
                                                <b>{{ $plan->name }}: </b>
                                                {{ $vendor->coupons->where('price', $plan->price)->count() }} coupons
                                                <br>
                                            @endforeach
                                    </td>
                                    <td>{{ $vendor->coupons_sold }}</td>

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
