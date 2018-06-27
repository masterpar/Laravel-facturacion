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
                        <label class="col-md-12">Nombre</label>
                        <div class="col-md-12">
                            <input type="text" placeholder="{{$buyer->name}}" class="form-control form-control-line">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="example-email" class="col-md-12">Email</label>
                        <div class="col-md-12">
                            <input type="email" placeholder="{{$buyer->email}}" class="form-control form-control-line" name="example-email" id="example-email">
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
                             <a href= "/buyer "class="btn btn-primary btn-rounded waves-effect waves-light m-b-10" > Regresar </a>
                        </div>
                    </div>
                </form>
            </div>

            <!--    Productos Comprados -->

    <div class="card">
    <div class="card-header"> <h2><b>Productos Comprados</b></h2>  </div>
                            <!----------------------------- Productos ---------------------------->                            
    <div class="row">
<div class="col-lg-12">
     <div class="card-block">
        @if(isset($products))
         <div class="table-responsive">
          <table class="table">
           <thead>
             <tr>
                <th>Imagen</th>
                <th>id</th>
                <th>Nombre</th>                                
                <th>Descripción</th>
                <th>Cantidad</th>                                
                <th>Estado Stock</th>
                <th>Acciones</th>                                
                </tr>                                                          
                </thead>                       
                <tbody>
                <tr>
                @foreach($products as $product)
                <td><img src=" {{ asset('img/'.$product->image[0])}} "></td>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->status }}</td>
                <td>
                 <a href= "{{ route('Producto.product',$product->id)}}"
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
    @else
    <h3>No registra productos comprados</h3>
    @endif
</div>                          
</div>
     <!---------------------------- Fin productos ------------------->
</div>
</div>
@endsection