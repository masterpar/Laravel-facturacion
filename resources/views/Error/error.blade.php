@extends('layouts.pl-users')

@section('content')


 <section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>{{ $code }}</h1>
                <h3 class="text-uppercase">{{ $mensaje}}</h3>
                <p class="text-muted m-t-30 m-b-30"> Pagina no encontrada !</p>
                <a href="index.html" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">regresar</a> </div>
            <footer class="footer text-center">© 2018 blink</footer>
        </div>
    </section>




@endsection