@component('mail::message')
# KPUM UTAMA

Hak suara anda telah terdaftar, silahkan login. <br>
Password : <b>{{ $maildata['password'] }}</b>

@component('mail::button', ['url' => config('app.url')])
Login
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
