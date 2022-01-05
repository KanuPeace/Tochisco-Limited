@extends("Dashboards.users.layouts.app")
@section('contents')


    <div class="profile_card color-card-2 m-4">

        <a href="{{ $user->avatarUrl() }}" target="_blank">
            <img src="{{ $user->avatarUrl() }}" alt="avatar" class="img-fluid profile mt-5">
        </a>
        {{-- <h4 class="title-2 mt-3 text-primary">{{ $user->names() }}</h4> --}}
        {{-- <button class="mybtn2 color-a top">Plan: <b>{{ auth()->user()->activePlan()->plan_name }}</b></button> --}}

        <div class="p-5 text-left">
            <div class="">
                <b>Email:</b> {{ $user->email }}
            </div>
            <div class="">
                <b>Phone Number:</b> {{ $user->phone ?? 'N/A' }}
            </div>
            <div class="">
                <b>Joined on:</b> {{ date('Y-m-d', strtotime($user->created_at)) }}
            </div>
            {{-- <div class="">
            <b>Referred By:</b> {{ $user->referrer()->names() ?? 'N/A' }}
        </div>
        <div class="">
            <b>Referral Code:</b> {{ $user->ref_code }}
        </div>
        <div class="">
            <b>Referral Link:</b> <a href="{{ $user->refUrl() }}" target="_blank">Click to copy</a>

        </div> --}}

        </div>
        <div>
            <a href="{{ route('users.edit_profile') }}" type="submit" class=" w-50 btn btn-primary btn-lg">Edit</a>
        </div>
    </div>
@endsection
