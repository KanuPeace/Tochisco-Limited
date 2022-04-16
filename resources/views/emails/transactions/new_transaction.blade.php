@component('mail::message')
Hey {{$user->first_name }},

A new <b>{{strtolower($transaction->type)}}</b> transaction occured on your account. Kindly find the details below:

<p>
    <b>Amount: </b> <span class="text-danger">{{ $transaction->formatAmount($transaction->amount) }}</span>
</p>
<p>
    <b>Description: </b> <span class="text-success">{{ $transaction->description }}</span>
</p>
<p>
    <b>Reference No.: </b> <span class="text-success">#{{ $transaction->reference }}</span>
</p>
<p>
    <b>Activity: </b> <span class="text-success">{{ $transaction->activity }}</span>
</p>
<p>
    <b>Status: </b> <span class="text-success">{{ $transaction->status }}</span>
</p>

@component('mail::button', ['url' => route("login")])
    Login to account
@endcomponent

Thanks,<br>
Customer Care
@endcomponent
