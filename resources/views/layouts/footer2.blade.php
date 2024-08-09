<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pagina Principal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('assets/master.css') }}">
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>

<body>
    <footer class="container otrofooter">
        <div class="row">
            <div class="col-lg-4 col-12 div-1-footer">
                <nav>
                    <ul id="ul-footer">
                        <li class="li-footer">
                            <a href="{{ url('/') }}" class="a-footer">Inicio</a>
                        </li>
                        <li class="li-footer">
                            <a href="{{ url('nosotros') }}" class="a-footer">Nosotros</a>
                        </li>
                        <li class="li-footer">
                            <a href="{{ url('productos') }}" class="a-footer">Productos</a>
                        </li>
                        <li class="li-footer">
                            <a href="{{ url('contacto') }}" class="a-footer">Contacto</a>
                        </li>

                        @if(auth()->check())
                            @if (auth()->user()->role === 'admin')
                                    <li class="li-footer">
                                        <a class="a-footer" href="{{ url('users') }}">Usuarios</a>
                                    </li>
                                    <li class="li-footer">
                                        <a class="a-footer" href="{{ url('products') }}">ABM Productos</a>
                                    </li>
                                    <li class="li-footer">
                                        <a class="a-footer" href="{{ url('categories') }}">Categorias</a>
                                    </li>
                                @endif
                        @endif
                    </ul>
                </nav>
                
            </div>
            
            <div class="col-lg-4 col-12 div-3-footer" >
                <h2 id="titulo-contacto-footer">Contactanos</h2>
                <p class="p-footer">matastico@gmail.com</p>
                <p class="p-footer">011 3490-7638</p>
            </div>

            <div class="col-lg-4 col-12 div-2-footer">
                <div id="div-apps">
                <a href="https://www.facebook.com" target="_blanck" class="apps"><img src="{{ asset('img/facebook.png') }}" alt="facebook"></a>
                <a href="https://www.instagram.com" target="_blanck" class="apps"><img src="{{ asset('img/instagram.png') }}" alt="instagram"></a>
                <a href="https://www.twitter.com" target="_blanck" class="apps"><img src="{{ asset('img/twitter.png') }}" alt="twitter"></a>
                </div>   
                
                <p>Copyright 2024 © Matastico</p>
            </div>
        </div>

    </footer>
    
</body>
</html>