@extends('layouts.app')
<link rel="icon" type="image/png" sizes="16x16" href="assets/images/favicon.png">
    <title>Blink</title>
    <!-- Bootstrap Core CSS -->
    <link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">
   
   <script src="{{ asset('js/app.js') }}" defer></script>

@section('content')

    
            <div class="container-fluid">

 <div class="row">
    <!-- Column -->
    <div class="col-lg-4 col-xlg-3 col-md-5">
        <div class="card">
            <div class="card-block">
                <center class="m-t-30"> <img src="{{$user->image}}" class="img-circle" width="150" />
                    <h4 class="card-title m-t-10">{{$user->name}}</h4>
                    <h6 class="card-subtitle">{{$user->email}}</h6>

                </center>
            </div>
        </div>
    </div>
    <!-- Column -->
    <!-- Column -->
    <div class="col-lg-8 col-xlg-9 col-md-7">
        <div class="card">
            <div class="card-block">
                <form class="form-horizontal form-material">
                    <div class="form-group">
                        <label class="col-md-12">Nombre</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$user->name}}" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" placeholder="{{$user->email}}" class="form-control form-control-line" name="example-email" id="example-email">
                        </div>
                    </div>
 
                    </div>
                    <div class="form-group">
                        <label class="col-sm-12">Selecciones el País</label>
                        <div class="col-sm-12">
                            <select class="form-control form-control-line">
                                <option>Colombia</option>
                                <option>Argentina</option>
                                <option>Peru</option>
                                <option>Brasil</option>
                                <option>Ecuador</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Actualizar perfil</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Column -->
</div>
    

@endsection