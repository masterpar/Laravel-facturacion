<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\ApiController;
use App\Mail\UserCreated;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class UserController extends ApiController
{
   
    public function index()
    {
        $usuarios = User::all();
       return $this->showAll($usuarios);
    }

  
    //  ---------------------------------- Crear usuario --------------------------------------

    public function store(Request $request)
    {

        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed'
        ];

        $this->validate($request, $rules);

        $campos= $request->all();
        $campos['password'] = bcrypt($request->password);
        $campos['verified']= User::USUARIO_NO_VERIFICADO;
        $campos['verification_token'] = User::generarVerificationToken();
        $campos['admin'] = User::USUARIO_REGULAR;

        $usuario = User::create($campos);
        return $this->showOne($usuario, 201);
    }

    //  ---------------------------------- Mostrar usuario --------------------------------------

    public function show(User $user)
    {
        return $this->showOne($user);
    }

    //  ---------------------------------- Actualizar usuario --------------------------------------

    public function update(Request $request, User $user)
    {
         $reglas = [
             'email' => 'email|unique:users,email,' . $user->id,
             'password' => 'min:6|confirmed',
             'admin' => 'in:' . User::USUARIO_ADMINISTRADOR . ',' . User::USUARIO_REGULAR,
         ];

      $this->validate($request, $reglas);

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('email') && $user->email != $request->email) {

                $user->verified = User::USUARIO_NO_VERIFICADO;
                $user->verification_token = User::generarVerificationToken();
                $user->email = $request->email;
        }

        if ($request->has('password')) {
             $user->password = bcrypt($request->password);
        }

        if ($request->has('admin')) {
            if (!$user->esVerificado()) {
                return $this->errorResponse('Unicamente usuarios verificados pueden cambiar su valor de administrador', 409);
            }

            $user->admin = $request->admin;
        }

         if (!$user->isDirty()) {
                return $this->errorResponse('Se debe especificar al menos un valor diferente para actualizar', 422);
            }

        $user->save();

        return $this->showOne($user);

    }

    //  ---------------------------------- Eliminar usuario --------------------------------------
    public function destroy(User $user)
    {
        $user->delete();
        return $this->showOne($user);
        
    }

     //  ---------------------------------- Verificar usuario --------------------------------------

    public function verify($token)
    {
        $user = User::where('verification_token',$token)->firstOrFail();
        $user->verified = User::USUARIO_VERIFICADO;
        $user->verification_token = null;
        $user->save();

        return  $this->showMessage('La cuenta ha sido verificada');
    }

     //  ---------------------------------- verificar correo usuario --------------------------------------

    public function resend(User $user)
    {
        if ($user->esVerificado()) {
            return $this->errorResponse('El usuario ya ha sido verificado', 409);
        }

        retry (5, function() use ($user) {
                Mail::to($user)->send(new UserCreated($user));
            }, 100);
        
        return $this->showMessage('El correo de verificación se ha reeenviado');
    }

}
