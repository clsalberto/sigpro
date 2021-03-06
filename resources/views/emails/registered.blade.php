@component('mail::message')
# Bem-vindo, {{ $name }}

Seguem abaixo seus dados para o acesso ao sistema.
Recomendamos por motivo de segurança que altere essa senha após o primeiro acesso.

@component('mail::panel')
    <b>Usuário:</b> {{ $email }}<br>
    <b>Senha:</b> {{ $password }}
@endcomponent

Atenciosamente,<br>
<b>{{ config('app.name') }}</b>
@endcomponent
