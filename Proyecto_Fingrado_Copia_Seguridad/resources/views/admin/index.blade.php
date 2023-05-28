@extends('adminlte::page')

@section('title', 'TradeVibes')

@section('content_header')
    
@stop

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mt-3">
                    <div class="card-header">
                        <img width="10%" src="{{asset('assets/imgs/logo/Mi proyecto2.png')}}" alt="">
                        ¡Bienvenido {{Auth::user()->name}} al Panel de Administración de tu Inventario!
                        
                    </div>

                    <div class="card-body">
                        <p>Estamos encantados de tener a emprendedores como tú en nuestra comunidad. Como vendedor en nuestra plataforma, tendrás acceso a un conjunto de herramientas y funcionalidades diseñadas para potenciar tu éxito en el mundo del comercio electrónico.</p>
                        <p>En este Panel de Vendedor, encontrarás todo lo que necesitas para gestionar tus productos, controlar tus ventas y conectar con tus clientes de manera efectiva. Desde aquí, podrás agregar y editar tus productos, establecer precios, administrar el inventario y mantener tus listados siempre actualizados.</p>
                        <p>Además, te proporcionaremos valiosas estadísticas e informes para que puedas evaluar el rendimiento de tus productos y tomar decisiones basadas en datos. Podrás analizar tus ventas, seguir el flujo de efectivo, identificar tendencias y oportunidades de crecimiento, y optimizar tu estrategia de ventas.</p>
                        <p>En nuestro Panel de Vendedor, también encontrarás herramientas de comunicación para interactuar con tus clientes de forma directa y personalizada. Podrás responder preguntas, gestionar consultas y brindar un excelente servicio al cliente. Estamos comprometidos en construir una comunidad sólida y confiable, donde la satisfacción de tus clientes sea nuestra prioridad.</p>
                        <p>Además, nuestro equipo de soporte estará a tu disposición para ayudarte en cada paso del camino. Si tienes alguna pregunta, duda o necesitas asistencia, estaremos encantados de brindarte la ayuda que necesitas para que tu experiencia como vendedor en nuestra plataforma sea exitosa.</p>
                        <p>Recuerda que tu éxito como vendedor depende de tu dedicación, calidad de tus productos y el excelente servicio que ofreces a tus clientes. Estamos emocionados de ver tu negocio crecer y prosperar en nuestra plataforma.</p>
                        <p>Gracias por ser parte de nuestra comunidad de vendedores y confiar en nosotros como tu socio en el éxito del comercio electrónico.</p>
                        <p>¡Bienvenido al Panel de Vendedor y que tengas un gran éxito en tu negocio!</p>
                        <div class="signature-container">
                            <p class="company-name">TradeVibes</p>
                            <p class="sincerely">Sinceramente,</p>
                            <p class="signature">Pablo Millán Montero</p>
                        </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

<style>
    .signature-container {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px;
        border: 1px solid #ccc;
        width: 300px;
    }

    .signature-container p {
        margin: 0;
        padding: 0;
    }

    .company-name {
        font-weight: bold;
        font-size: 16px;
    }

    .sincerely {
        font-style: italic;
    }

    .signature {
        margin-top: 20px;
    }
</style>