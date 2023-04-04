@component('mail::message')
# Welcome {{$username}}

<h2>we are received a request to reset the password for <strong>blog</strong> account associated with {{$email}}</h2>
<b>You can reset your password by clicking the button below </b>

@component('mail::button', ['url' => $link])
Reset Password
@endcomponent
<b> if you did not request for a password reset, please ingore this email </b>
<br>
Thanks,<br>
{{ config('app.name') }}
@endcomponent
