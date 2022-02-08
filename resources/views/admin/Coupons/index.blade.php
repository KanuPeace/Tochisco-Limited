@extends("dashboards.admin.layouts.app")
@section('content')
    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Coupons</h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped table-checkable table-highlight-head mb-4">
                        <thead>
                            <tr>
                                <th class="">S/N</th>
                                <th class="">Vendor</th>
                                <th class="">Used By</th>
                                <th class="">Code</th>
                                <th class="">Used On</th>
                                <th class="">Expire At</th>
                                <th class="">Price</th>
                                <th class="">Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($coupons as $coupon)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>{{ $coupon->vendor->first_name }}</td>
                                    <td>
                                        @if (!empty(($user = optional($coupon->user))) && !empty($user->id))
                                        <a href="{{ route('admin.users.show', $user->id) }}" class="text-primary">
                                            {{ $user->names() }}
                                        </a>
                                    @else
                                        N/A
                            @endif

                            </td>
                            <td>{{ $coupon->code }}</td>
                            <td>{{ $coupon->used_on }}</td>
                            <td>{{ $coupon->expire_at }}</td>
                            <td>{{ format_money($coupon->price) }}</td>
                            <td>{{ $coupon->created_at }}</td>
                            </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $coupons->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
