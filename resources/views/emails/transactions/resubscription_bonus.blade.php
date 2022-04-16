@component('mail::message')
Hey {{$referrer->first_name }},

You earned {{$bonus}} bonus as one of your referrals, {{$user->first_name }} just re-subscribed for a plan.

@component('mail::button', ['url' => route("login")])
    Login to account
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
