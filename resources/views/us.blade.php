@extends('layouts.footer')
@extends('layouts.main')

@section('content')

<div class="container container-main">
    <div class="row">
        <div class="col-12">
            <h1 class="titulo">QUIENES SOMOS</h1>
            <p class="parrafo">Somos empresa dedicada a la fabricación y venta de mates, con un enfoque en la artesanía y la personalización.Nuestros mates son elaborados a mano por artesanos expertos, utilizando materiales de primera calidad que garantizan no solo belleza estética, sino también durabilidad y funcionalidad. Cada pieza que creamos es el resultado de un proceso cuidadoso y detallado, pensado para brindar una experiencia de mate excepcional.Además, en Matastico creemos que cada persona es única. Por eso, ofrecemos un servicio de personalización que permite a nuestros clientes diseñar su propio mate, convirtiéndolo en un objeto personal y significativo. Desde grabados hasta elecciones de colores y estilos, te ayudamos a crear el mate que realmente refleje tu personalidad.Nuestro compromiso con la excelencia y la satisfacción del cliente nos impulsa a seguir innovando y mejorando. Ya sea que estés buscando un mate tradicional o una pieza completamente personalizada, en Matastico nos dedicamos a hacer de cada momento de mate una experiencia especial.</p>
            <img src="{{ asset('img/mates-us.png') }}" alt="mate" class="img-fluid imagen">
        </div>
    </div>
</div>
<div class="container container-main">
<h2 class="titulo">NUESTRO OBJETIVO</h2>
    <p class="parrafo"> Nuestro objetivo es ser una empresa líder en la venta de artículos de mate, ofreciendo personalización y atención al cliente excepcional. Buscamos expandir nuestra comunidad de amantes del mate, fomentando el disfrute y la apreciación de esta tradición, mientras apoyamos el trabajo artesanal y sostenible. Queremos que cada mate que fabricamos y personalizamos sea una expresión de individualidad y un recuerdo perdurable para quienes lo disfrutan</p>
    <div class="row">
        <div class="col-sm-12 col-md-6">
            <img src="{{ asset('img/mate-us-columna1.jpg') }}" alt="mate" class="img-fluid imagen imagen-columna">
        </div>
        <div class="col-sm-12 col-md-6">
        <img src="{{ asset('img/mate-us-columna2.jpg') }}" alt="mate" class="img-fluid imagen imagen-columna">
        </div>
    </div>
</div>

@endsection