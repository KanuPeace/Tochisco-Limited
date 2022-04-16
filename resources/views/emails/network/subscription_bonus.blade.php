@component('mail::message')
Dear {{ $user->first_name }},

Someone in your network just subscribed for a plan. You have been credited with <b>{{$amount}}</b>.

@component('mail::button', ['url' => route("user.wallet.transactions")])
    View Transactions
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
