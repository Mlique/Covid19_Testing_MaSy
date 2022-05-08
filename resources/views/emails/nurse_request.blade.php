@component('mail::message')
# Welcom to our clinic. We're happy to have you.

Your test request was approved, this is your schedule set for you
{{ request()->date }} between {{ request()->time_slot }}
 Our nurse would be in touch. Thank You!

@component('mail::button', ['url' => 'http://127.0.0.1:8000'])
Login Here
@endcomponent

Kind Regards,<br>
{{ config('app.name') }}
@endcomponent
