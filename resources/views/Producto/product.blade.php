@extends('layouts.app')
<link href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- chartist CSS -->
    <link href="assets/plugins/chartist-js/dist/chartist.min.css" rel="stylesheet">
    <link href="assets/plugins/chartist-js/dist/chartist-init.css" rel="stylesheet">
    <link href="assets/plugins/chartist-plugin-tooltip-master/dist/chartist-plugin-tooltip.css" rel="stylesheet">
    <!--This page css - Morris CSS -->
    <link href="assets/plugins/c3-master/c3.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <!-- You can change the theme colors from here -->
    <link href="css/colors/blue.css" id="theme" rel="stylesheet">

@section('content') 

   <!-- Column -->
    <div class="col-lg-8 col-xlg-8x ">
        <div class="center-block ">
            <div class="card-block">
                <form class="form-horizontal form-material">
                    <div class="form-group">

                    </div>
                    <div class="form-group">
                        <label class="col-md-12">Nombre</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$product->name}}" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Descripción</label>
                        <div class="col-md-12">
                            <input type="email" placeholder="{{$product->description}}" class="form-control form-control-line" name="example-email" id="example-email">
                        </div>
                    </div>
                       <div class="form-group">
                        <label for="example-email" class="col-md-12">Cantidad</label>
                        <div class="col-md-12">
                            <input type="email" placeholder="{{$product->quantity}}" class="form-control form-control-line" name="example-email" id="example-email">
                        </div>
                    </div>
                     <div class="form-group">
                        <label for="example-email" class="col-md-12">Stock</label>
                        <div class="col-md-12">
                            <input type="email" placeholder="{{$product->status}}" class="form-control form-control-line" name="example-email" id="example-email">
                        </div>
                    </div>
 
                    </div>
                    <div class="form-group">
                        <div class="col-sm-12">
                            <button class="btn btn-success">Actualizar perfil</button>
                             <a href= "/buyer "class="btn btn-primary btn-rounded waves-effect waves-light m-b-10" > Regresar </a>
                        </div>
                    </div>
                </form>
            </div>

            <!--    Productos Comprados -->



@endsection