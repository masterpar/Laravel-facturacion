@component('mail::mesagge')
# Hola {{$user->name}}

has cambiado tu correo. Por favor verifica la nueva dirección usando el siguiente Botón:

@component('mail::button',['url' => 'route('verify', $user->verification_token)' ] )
Confirmar mi cuenta
@endcomponent

Gracias,<br>
{{config('app.name')}}
@endcomponent