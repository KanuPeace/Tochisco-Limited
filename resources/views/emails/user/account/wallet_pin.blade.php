@component('mail::message')
Hey {{ $user->first_name }},

Kindly find your new wallet pin below as requested:

**Wallet Pin**: {{ $pin }}

If you are unaware of this request , please contact support or change your login credentials to ensure account security!

@component('mail::button', ['url' => route("home")])
Go to Dashboard
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
