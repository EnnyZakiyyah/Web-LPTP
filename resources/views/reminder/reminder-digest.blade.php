@component('mail::message')
# Reminders

{{-- You have some reminders to follow up.  --}}
Besok Tanggal Terakhir Pengembalian Buku

Please Check your account 

@component('mail::button', ['url' => 'http://127.0.0.1:8000/sign-in'])
Click Here
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
