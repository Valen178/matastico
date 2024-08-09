@extends('layouts.footer')
@extends('layouts.main')

@section('content')

<div class="container container-main">
    <h1 class="titulo-h1" >CONTACTANOS</h1>
    <div class="row">
        <div class="col-sm-12 col-md-6 col-lg-6 div-contacto">
            <h2>WHATSAPP</h2>
            <p>011 3490-7638 de lunes a viernes de 9-18hrs, sabados y feriados de 10-16hrs</p>
        </div>
        <div class="col-sm-12 col-md-6 col-lg-6 div-contacto">
            <h2>LLAMADA</h2>
            <p>011 3490-7639 de lunes a viernes de 9-18hrs, sabados y feriados de 10-14hrs</p>
        </div>
    </div>
</div>

<div container-main>
    <div class="container-fluid div-contacto" id="form-contacto">
        <h2 class="titulo">ESCRIBENOS</h2>
        <form action="#" method="get" class="formulario-contacto">
            <div class="row block">
                <div class="col-md-6 div-margin">
                    <label for="nombre" class="label-contacto">Nombre:</label>
                    <input type="text" id="nombre" placeholder="José" maxleght="20" required class="input-formulario">
                </div>
                <div class="col-sm-12 col-md-6 div-margin">
                    <label for="apellido" class="label-contacto">Apellido:</label>
                    <input type="text" id="apellido" placeholder="Gonzalez" maxleght="25" required class="input-formulario">
                </div>
            </div>
            <div class= "row block">
                <div class="col-sm-12 col-md-6 div-margin">
                    <label for="email" class="label-contacto">Email:</label>
                    <input type="email" id="email" placeholder="jose.gonzalez@gmail.com" maxleght="40" required class="input-formulario">
                </div>
                <div class="col-sm-12 col-md-6 div-margin">
                    <label for="telefono" class="label-contacto">Telefono:</label>
                    <input type="number" id="telefono" placeholder="1130209844" maxleght="14" required class="input-formulario">
                </div>
            </div>
            <div class="row block">
                <div class="col-sm-12 col-md-6 div-margin">
                    <label for="motivo" class="label-contacto">Motivo:</label>
                    <input type="text" id="motivo" placeholder="Devolución" maxleght="40" required class="input-formulario">
                </div>
                <div class="col-sm-12 col-md-6 div-margin">
                    <label for="nrocompra" class="label-contacto">NºCompra(opcional):</label>
                    <input type="number" id="nrocompra" placeholder="0034789" maxleght="7" class="input-formulario">
                </div>
            </div >
            <div class="row block">
                <label for="descripcion" class="label-contacto">Descripción:</label>
                <textarea id="descripcion" cols="30" rows="5" placeholder="Deje su comentario" required></textarea>
            </div>
            <div class="row block">
                <input type="submit" class="enviar">
            </div>
        </form>
    </div>
</div>

@endsection