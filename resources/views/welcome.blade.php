<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="icon" href="http://127.0.0.1:8000/img/monkey.ico">
        <title>Crazyluches.com</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="http://127.0.0.1:8000/css/style.css">
        <link rel="stylesheet" href="http://127.0.0.1:8000/css/custom-animations.css">
        
    
        <!-- Styles -->
        <style>
            
            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: absolute;
                right: 53px;
                padding-top: 20px;
            }
        </style>
</head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right">
                    @auth
                        <a href="{{ url('/home') }}" style="color:#fff">Tu cuenta</a>
                    @else
                        <a href="{{ route('login') }}" style="color:#fff;margin-right: 23px;">Conectarse</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" style="color:#fff">Registrate</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    <div id="h">
        <div class="container">
            <div class="row">
                <div class="col-md-10 col-md-offset-1 mt cont">
                    <h3>¿Aún no sabes que regalar a esa personas especial?</h3>
                    <h1 class="mb">CRAZY LUCHES</h1>
                </div>
                <div class="col-md-12 mt ">
                    <a href="/create" type="button" class="lets btn btn-success btn-lg ">CREAR</a>
                    <!-- <img src="images/graph.png" class="img-responsive aligncenter" alt="" data-effect="slide-bottom"> -->
                </div>
            </div>
        </div>
    </div>
    <input style="display:none" value="0">
    <div id="w">
        <div class="title"><span class="title-con">Conocenos</span><p class="sub-con">Empresa 100% mexicana y dignamente quintanarroense</p></div>

        <div class="row nopadding">
            <div class="col-md-5 col-md-offset-1 mt">
                <h4>Escoge tu plan ideal</h4>
                <p>Puedes realizar tus pagos desde un autservicio como OXXO o Circle K y recibiras tu producto en el tiempo indicado</p>
                <a class="mt" href="/create"><button class="btn btn-info btn-theme">Quiero intentar</button></a>
            </div>
            
            <div class="col-md-6 pull-right">
                <img src="http://127.0.0.1:8000/img/people.png" class="img-responsive align-images-right" alt="" data-effect="slide-right">
            </div>
        </div>
    </div>
    
    
    
    <div id="picton">
        <div class="row nopadding">
            <div class="col-md-6 pull-left">
                <img src="http://127.0.0.1:8000/img/index.jpg" class="img-responsive align-images-left" alt="" data-effect="slide-left">
            </div>
            <div class="col-md-5 mt">
                <h4>Diseña tu modelo</h4>
                <p>Escoge uno de nuestros modelos de peluches, escoge uno de los colores disponibles y agregale extras a tu peluchye</p>    
                <a class="mt" href="/create"><button class="btn btn-white btn-theme">Diseñar</button></a>
            </div>
        </div>
    </div>
    
    
    <div id="curious">
        <div class="row nopadding">
            <div class="col-md-5 col-md-offset-1 mt">
                <h4>Realiza tu pago y recibe tu producto</h4>
                <p>Puedes realizar tus pagos desde un autoservicio como OXXO o circle K y recibiras tu producto en el tiempo indicado</p>
                <a class="mt" href="/create" ><button class="btn btn-white btn-theme">Quiero intentar</button></a>
            </div>
            
            <div class="col-md-6 pull-right">
                <img src="http://127.0.0.1:8000/img/card.png" class="img-responsive align-images-right" alt="" data-effect="slide-right">
            </div>
        </div>
    </div>
    
    <div id="malibu" >
        <div class="title"><span class="title-con">Testimonios</span><p class="sub-con">Si aún no te convencemos, ojalá que las opiniones de nuestros clientes lo hagan</p></div>
        <div class="container"> 
        <div class="row mrg-a">

            <div class="thumbnail col-md-4 marg-rigt carde-t row">
              <div class="col-md-6"><img src="http://127.0.0.1:8000/img/persona1.jpg" class="rounded-img"></div><div class="col-md-6">Emma</div>
              <div class="caption">
                <h3>"Una forma muy creativa"</h3>
                <p>Es un concepto nuevo de realizar un regalo personalizado además que ofrece una forma fácil de diseñarlo</p>
              </div>
            </div>

            <div class="thumbnail col-md-4 marg-rigt carde-t row">
              <div class="col-md-6"><img src="http://127.0.0.1:8000/img/persona2.jpg" class="rounded-img"></div><div class="col-md-6">Rafel alias rafiki</div>
              <div class="caption">
                <h3>"Es una plataforma con una idea única"</h3>
                <p>Es innovador, además ofrece formas de pagos accessibles</p>
                
              </div>
            </div>

            <div class="thumbnail col-md-4 carde-t row">
              <div class="col-md-6"><img src="http://127.0.0.1:8000/img/persona3.jpg" class="rounded-img"></div><div class="col-md-6">Carla</div>
              <div class="caption">
                <h3>"Me encanta"</h3>
                <p>Mi novio quedó encantado con el regalo, fue fácil realizar la compra y el envio fue rápido</p>
                
              </div>
            </div>

        </div>
    </div>
    </div>
    

    <section id="precios">
                <div class="title"><span class="title-con">Precios</span><p class="sub-con">Los precios dependerán de los materiales y formas de envio que desees</p></div>
        <div class="container">
            <div class="row mrg-a">
             <div class="thumbnail col-md-6 carde-f">
             
              <div class="caption">
                <h3>Estandar</h3>
                <p class="espacio">desde $<span class="price-txt">100</span>/mxn</p>
                <div class="txt-ce">
                    <img src="http://127.0.0.1:8000/img/pika.png">
                    <p><a href="/create" class="btn btn-primary" role="button">Ordenar</a></p>
                </div>
              </div>
            </div>
            <div class="thumbnail col-md-6 carde-f back-blue">
              <div class="caption">
                <h3>Cotización personalizada</h3>
                <p >Envianos tu propuesta y nosotros te decimos el precio ;)</p>
                <div class="txt-ce"><img src="http://127.0.0.1:8000/img/pikapika.png">
                <p><a href="/create" class="btn btn-primary back-white" role="button">Ordenar</a></p>
                </div>
              </div>
            </div>
            </div>
        </div>

    </section>
    <div id="c">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3 centered">
                    <p>Copyright 2019 | CrazyLuches.com</p>
                </div>
            </div>
        </div>
    </div>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script type="text/javascript" src="http://127.0.0.1:8000/js/jquery.unveil.js"></script>
    <script type="text/javascript" src="http://127.0.0.1:8000/js/retina.min.js"></script>
    </body>
</html>
