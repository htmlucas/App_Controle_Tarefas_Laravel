@component('mail::message')
# Introdução

Corpo da mensagem.

@component('mail::button', ['url' => ''])
Texto do botão
@endcomponent

Valeu,<br>
{{ config('app.name') }}
@endcomponent
