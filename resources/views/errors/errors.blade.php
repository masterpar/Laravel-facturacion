@extends('layouts.pl-users')

@section('content')


<section id="wrapper" class="error-page">
        <div class="error-box">
            <div class="error-body text-center">
                <h1>{{ $code }}</h1>
                <h3 class="text-uppercase">Error !</h3>
                <p class="text-muted m-t-30 m-b-30">mensaje</p>
                <a href="/usuarios" class="btn btn-info btn-rounded waves-effect waves-light m-b-40">Regresar</a> </div>
            <footer class="footer text-center">© 2018 Blink.</footer>
        </div>
    </section>

@endsection