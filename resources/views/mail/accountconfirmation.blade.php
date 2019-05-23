@component('mail::message')
# Your Account Information

@component('mail::panel')
Email Address: {{ $email_address }}
@endcomponent

@component('mail::panel')
Password: {{ $generated_password }}
@endcomponent

@component('mail::button', ['url' => url('http://inventory.buscoms.com'), 'color' => 'success'])
Click Here!
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
