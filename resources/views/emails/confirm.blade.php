Hola {{$user->name}}
has cambiado tu correo. Por favor verifica la nueva dirección usando el siguiente enlace:

{{route('verify', $user->verification_token)}}