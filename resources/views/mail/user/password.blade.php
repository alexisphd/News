@component('mail::message')
    Здравствуйте.
    Вы зарегистрировались в моем блоге.

    Пароль для входа: {{$password}}
    Логин для входа: {{$name}}


    Живите и процветайте,<br>
    {{ config('app.name') }}
@endcomponent
