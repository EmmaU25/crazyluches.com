<!DOCTYPE html>
<html>
<head>
	<title>Crazyluches.com</title>
	<link rel="icon" href="http://127.0.0.1:8000/img/monkey.ico">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="{{asset('css/create.css')}}">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r58/three.min.js"></script>

	<script type="text/javascript" src="https://s.cdpn.io/25480/OrbitControls.js"></script>
	<script type="text/javascript" src="{{ asset('js/3dcreate.js')}}">
</script>
</head>
<body onload="init()" bgcolor="#CCC">
<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    Crazyluches.com
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Conectarse') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <div class="container">
        	<div class="row">
        		<div class="col-md-4">
        			<div>
        				<span><strong>Crazyluches Maker</strong></span>
        				<p>Construye tu peluche escogiendo tus colores favoritos, y tamaño</p>
        			</div>

        			<div class="opt-menu">
	        				<button class="btn btn-primary menu-btn" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
						    <i class="fa fa-folder" aria-hidden="true"></i> Modelos
						  </button>
						  <div class="collapse" id="collapseExample">
						  <div class="card card-body">
							<button type="button" onclick="installModel('fnaf.js',0xffffff)">Caballo</button>
							<button type="button" onclick="installModel('barril.js',0)">Barril</button>    
						  </div>
						</div>
        			</div>

        			<div class="opt-menu">
        				<button class="btn btn-primary menu-btn" type="button" data-toggle="collapse" data-target="#colors" aria-expanded="false" aria-controls="colors">
						    <i class="fa fa-eyedropper" aria-hidden="true"></i> Colores
						 </button>
						 <div class="collapse" id="colors">
						  <div class="card card-body">
							<button type="button" onclick="changeColor(0xFF1932)">Azul</button>
							  <button type="button" onclick="changeColor(0xFF00DE)">Verde</button>
						  </div>
						</div>
        			</div>
        			
        		</div>
        		<div class="col-md-5">
        			<canvas width=600 height=600 id="cnvs" style="background-color:white"></canvas>
   					<p class="msg-foot">Diseña tu peluche y envianoslo.</p> 
        		</div>
        		<div class="col-md-3"></div>
        	</div>
        </div>

<p style="color:#A00; font-weight: bold" id="message"></p>

</body>


</html>