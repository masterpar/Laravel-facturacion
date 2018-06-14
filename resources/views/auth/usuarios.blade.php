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