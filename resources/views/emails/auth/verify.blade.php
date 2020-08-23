@component('mail::message')
# Email confirmation

Please refer to the following links.

@component('mail::button', ['url' => route('register.verify', ['token' => $user->verify_token])])
Verify Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
