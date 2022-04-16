@component('mail::message')
Hello {{ $user->first_name }},

WELCOME TO FLAIRBO MARKETPLACE

Congratulations on your decision to join the largest community of entrepreneurs. Flairbo marketplace is here to help you reach millions of people looking for your products and services.

Your registration was successful. You have been credited with a ₦100,000.00 Signup Bonus Commission as one of the 1st one million Flairbo pioneer members. Kindly login to your account, update your profile and start selling your items.

You can invite others to sell with flairbo while earning elite pionts. We wish you a pleasant trading experience and success with Flairbo Marketplace.

@component('mail::button', ['url' => route('login')])
Login Now
@endcomponent

Kind regards and best wishes!<br>
Flairbo Customer Service.
@endcomponent
