@extends("admin.layouts.app")
@section('content')
    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4>Referrals</h4>
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
                                <th class="">Referred By</th>
                                <th class="">Bonus</th>
                                <th class="">Type</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($referrals as $referral)
                                <tr>
                                    <td>{{ $sn++ }}</td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $referral->user_id) }}"
                                            class="text-primary">
                                            {{ optional($referral->user)->names() }}
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.users.show', $referral->referrer_id) }}"
                                            class="text-primary">
                                            {{ optional($referral->referrer)->names() }}
                                        </a>
                                    </td>
                                    <td>{{ format_money($referral->bonus) }}</td>
                                    <td>{{ $referral->is_auto == 0 ? "Referred" : "Non-referred" }}</td>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {!! $referrals->links('pagination::bootstrap-4') !!}
                </div>
            </div>
        </div>
    </div>
@endsection
