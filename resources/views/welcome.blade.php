@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

 <!-- Usuarios -->
<div class="card-group">
  <div class="card">
    <img class="card-img-top" src="{{ asset('imges/vatar1.png') }}" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">Usuarios</h4>
      <p class="card-text">Usuarios en el Sistema</p>
      <h3> {{App\User::all()->count()}} </h3>
    <a href="/users" class="btn btn-info">Ver Usuarios</a>
    </div>
    <div class="card-footer">
      <small class="text-muted">Actualizado hace 3 minutos</small>
    </div>
  </div>

  <!-- compradores -->
  <div class="card">
    <img class="card-img-top" src="#" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">Compradores</h4>
      <p class="card-text">Compradores en el Sistema</p>
      <h3> {{App\Buyer::has('transactions')->count()}} </h3>
    <a href="/buyers" class="btn btn-info">Ver Compradores</a>
    </div>
    <div class="card-footer">
      <small class="text-muted">Actualizado hace 3 minutos</small>
    </div>
  </div>

   <!-- Vendedores -->
  <div class="card">
    <img class="card-img-top" src="#" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">Vendedores</h4>
      <p class="card-text">Compradores en el Sistema</p>
      <h3> {{App\Seller::has('products')->count()}} </h3>
    <a href="/sellers" class="btn btn-info">Ver Vendedores</a>
    </div>
    <div class="card-footer">
      <small class="text-muted">Actualizado hace 5 minutos</small>
    </div>
  </div>


</div>

<div class="card-group">

  <!-- Productos -->
<div class="card">
    <img class="card-img-top" src="#" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">Productos</h4>
      <p class="card-text">Productos Registrados</p>
      <h3> {{ App\Product::all()->count() }} </h3>
    <a href="/products" class="btn btn-info">Ver Productos</a>
    </div>
    <div class="card-footer">
      <small class="text-muted">Actualizado hace 5 minutos</small>
    </div>
  </div>

    <!-- Categorias -->

  <div class="card">
    <img class="card-img-top" src="#" alt="Card image cap">
    <div class="card-body">
      <h4 class="card-title">Categorias</h4>
      <p class="card-text">Categorias Registrados</p>
      <h3> {{ App\Category::all()->count() }} </h3>
    <a href="/products" class="btn btn-info">Ver Categorias</a>
    </div>
    <div class="card-footer">
      <small class="text-muted">Actualizado hace 20 minutos</small>
    </div>
  </div>
  
  
</div>





<!-- <div class="card" style="width: 18rem;">
<img class="card-img-top" src="{{}}" alt="Card image cap">
<div class="card-body">
<h5 class="card-title">ddd</h5>
<p class="card-text">dfdg</p>
<a href="/sellers" class="btn btn-primary">dfgg</a>
</div>
</div> -->
            

            </div>
        </div>
    </div>
</div>
@endsection
