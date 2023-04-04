@component('mail::message')
# Hello dear <span style="color: rgb(0, 0, 0);font-size:bold">{{$name}}</span>, we are happy to join us and we wish you all the best.

<h3> Please click on the button below, to activate your account:- {{$email}} </h3>

@component('mail::button', ['url' => $link])
Button Text
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
