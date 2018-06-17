@extends('layouts.pl-users')

@section('content')

<div class="row">
                    <!-- column -->
<div class="col-lg-12">
   <div class="card">
     <div class="card-block">
      <h4 class="card-title">Lista de Usuarios</h4>
        <h6 class="card-subtitle">Registrados </h6>
         <div class="table-responsive">
          <table class="table">
           <thead>
             <tr>
                <th>id</th>
                <th>Nombre</th>                                
                <th>Correo</th>
                <th>Verificado</th>                                
                <th>Admin</th>                               
                <th>Procesos</th>                                                                
                </tr>                                                          
                </thead>                       
                <tbody>
                <tr>
                @foreach($users as $user)
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->email }}</td>

                @if($user->verified == 1)
                <td>si</td>
                @else
                <td>no</td>
                @endif
                
                @if($user->admin  == 'true')
                <td>si</td>
                @else
                <td>no</td>
                @endif
                <td>
                <a href= " {{ route('usuario', $user->id) }} " 
                class="btn btn-primary btn-rounded waves-effect waves-light m-b-10" > Ver </a>
                </td>
                <td>
                <a href="#" class="btn btn-info btn-rounded waves-effect waves-light m-b-10">Editar</a>
                </td>
                <td>
                <a href="#" class="btn btn-danger btn-rounded waves-effect waves-light m-b-10">Eliminar</a>
                </td>
            </tr>
           @endforeach
        </tbody>
    </table>
   </div>
</div>
</div>
</div>
{{ $users->links() }}
</div>

@endsection