@component('mail::message')
<img src="{{ asset('img/logo.png') }}" alt="logo_kpum">
# KPUM UTAMA

Hak suara anda telah terdaftar, silahkan login. <br>
Password : <b>{{ $maildata['password'] }}</b>

@component('mail::button', ['url' => config('app.url')])
Login
@endcomponent

Terima kasih,<br>
{{ config('app.name') }}
@endcomponent
