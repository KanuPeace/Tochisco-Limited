@component('mail::message')
Dear {{ $user->first_name }},

{{$message}}

@component('mail::button', ['url' => route("user.ads.index")])
    View Ads
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
