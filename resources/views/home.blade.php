<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="{{ LAConfigs::getByKey('site_description') }}">
    <meta name="author" content="Dwij IT Solutions">

    <meta property="og:title" content="{{ LAConfigs::getByKey('sitename') }}" />
    <meta property="og:type" content="website" />
    <meta property="og:description" content="{{ LAConfigs::getByKey('site_description') }}" />
    
    <meta property="og:url" content="http://laraadmin.com/" />
    <meta property="og:sitename" content="laraAdmin" />
	<meta property="og:image" content="http://demo.adminlte.acacha.org/img/LaraAdmin-600x600.jpg" />
    
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:site" content="@laraadmin" />
    <meta name="twitter:creator" content="@laraadmin" />
    
    <title>{{ LAConfigs::getByKey('sitename') }}</title>
    
    <!-- Bootstrap core CSS -->
    <link href="{{ asset('/la-assets/css/bootstrap.css') }}" rel="stylesheet">

	<link href="{{ asset('la-assets/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    
    <!-- Custom styles for this template -->
    <link href="{{ asset('/la-assets/css/main.css') }}" rel="stylesheet">

    <link href='http://fonts.googleapis.com/css?family=Lato:300,400,700,300italic,400italic' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,700' rel='stylesheet' type='text/css'>

    <script src="{{ asset('/la-assets/plugins/jQuery/jQuery-2.1.4.min.js') }}"></script>
    <script src="{{ asset('/la-assets/js/smoothscroll.js') }}"></script>


</head>

<body data-spy="scroll" data-offset="0" data-target="#navigation">

<!-- Fixed navbar -->
<div id="navigation" class="navbar navbar-default navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><b>{{ LAConfigs::getByKey('sitename') }}</b></a>
        </div>
        <div class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="#home" class="smoothScroll">Inicio</a></li>
                <li><a href="#about" class="smoothScroll">Tu currículum</a></li>
                <li><a href="#contact" class="smoothScroll">Comencemos </a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::guest())
                    <li><a href="{{ url('/login') }}">Acceder</a></li>
                    <li><a href="{{ url('/register') }}">Regí    strate</a></li>
                @else
                    <li><a href="{{ url(config('laraadmin.adminRoute')) }}">{{ Auth::user()->name }}</a></li>
                @endif
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</div>


<section id="home" name="home"></section>
<div id="headerwrap">
    <div class="container">
        <div class="row centered">
            <div class="col-lg-12">
                <h1>{{ LAConfigs::getByKey('sitename_part1') }} <b><a>{{ LAConfigs::getByKey('sitename_part2') }}</a></b></h1>
                <h3>{{ LAConfigs::getByKey('site_description') }}</h3>
                <h3><a href="{{ url('/login') }}" class="btn btn-lg btn-success">¡Empieza ya!</a></h3><br>
            </div>
            <div class="col-lg-2">
                <h5>Gestiona tu currículum</h5>
                <p>Desde un panel amigable</p>
                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/la-assets/img/arrow1.png') }}">
            </div>
            <div class="col-lg-8">
                <img class="img-responsive" src="{{ asset('/la-assets/img/app-bg.png') }}" alt="">
            </div>
            <div class="col-lg-2">
                <br>
                <img class="hidden-xs hidden-sm hidden-md" src="{{ asset('/la-assets/img/arrow2.png') }}">
                <h5>Visualízalo y exportalo</h5>
                <p>Elige entre varias plantillas y genera un PDF</p>
            </div>
        </div>
    </div> <!--/ .container -->
</div><!--/ #headerwrap -->


<section id="about" name="about"></section>
<!-- INTRO WRAP -->
<div id="intro">
    <div class="container">
        <div class="row centered">
            <h1>Crea tu currículum de una manera sencilla</h1>
            <br>
            <br>
            <div class="col-lg-4">
                <i class="fa fa-cubes" style="font-size:100px;height:110px;"></i>
                <h3>Modular</h3>
                <p>Elige el formato más serio o el más atractivo en función de tus preferencias.</p>
            </div>
            <div class="col-lg-4">
                <i class="fa fa-paper-plane" style="font-size:100px;height:110px;"></i>
                <h3>Fácil de administrar</h3>
                <p>Rellena tus datos una vez, para distintos diseños.</p>
            </div>
            <div class="col-lg-4">
                <i class="fa fa-pagelines" style="font-size:100px;height:110px;"></i>
                <h3>Se libre</h3>
                <p>Tus datos son tuyos, elimina tu perfil y exporta tus datos cuando quieras.</p>
            </div>
        </div>
        <br>
        <hr>
    </div> <!--/ .container -->
</div><!--/ #introwrap -->

<!-- FEATURES WRAP -->
<div id="features">
    <div class="container">
        <div class="row">
            <div class="col-lg-5 centered">
                <img class="centered" src="{{ asset('/la-assets/img/mobile.png') }}" alt="">
            </div>

            <div class="col-lg-7">
				<h3 class="feature-title">¿Que es CV Editor?</h3><br>
				<ol class="features">
					<li>Es un editor de currículum online, donde podrás rellenar tus datos y generar distintas versiones de tu CV a través de las distintas plantillas que ofrecemos.</li>
					<li>Desarrollado en sofware libre, Puedes descargarlo e instarlo en tu propio servidor <a target="_blank" href="https://github.com/alexwing/cveditor">Aquí.</a></li>
               <li>Si eres desarrollador incluso podrás crear tus propias plantillas.</li>
				</ol><br>

				<h3 class="feature-title">¿Por qué CV Editor?</h3><br>
                <ol class="features">
					<li><strong>Filosofia:</strong> Crear tu porfolio sin necesidad de herramientas externas</li>
					<li>Superior <strong>CRUD generation</strong> for Modules which generates Migration, Controller, Model and Views with single artisan command and integrates with Routes as as well.</li>
					<li><strong>Form Maker</strong> helper is provided for generating entire form with single function call with module name as single parameter. It also gives you freedom to customise form for every field by providing method to generate single field with parameters for customisations.</li>
					<li><b>Upload Manager </b>manages project files &amp; images which are integrated with your Module fields.</li>
					<li><strong>Menu Manager</strong> creates menu with Modules &amp; Custom Links likes WordPress</li>
					<li><strong>Online Code Editor</strong> allows developers to customise the generated Module Views &amp; Files.</li>
				</ol>
            </div>
        </div>
    </div><!--/ .container -->
</div><!--/ #features -->

<section id="contact" name="contact"></section>
<div id="footerwrap">
    <div class="container">
        <div class="col-lg-5">
            <h3>Contact Us</h3><br>
            <p>
				Dwij IT Solutions,<br/>
				Web Development Company in Pune,<br/>
                B4, Patang Plaza Phase 5,<br/>
                Opp. PICT College,<br/>
                Katraj, Pune, India - 411046
            </p>
			<div class="contact-link"><i class="fa fa-envelope-o"></i> <a href="mailto:hello@laraadmin.com">hello@laraadmin.com</a></div>
			<div class="contact-link"><i class="fa fa-cube"></i> <a href="http://laraadmin.com">laraadmin.com</a></div>
			<div class="contact-link"><i class="fa fa-building"></i> <a href="http://dwijitsolutions.com">dwijitsolutions.com</a></div>
        </div>

        <div class="col-lg-7">
            <h3>Drop Us A Line</h3>
            <br>
            <form role="form" action="#" method="post" enctype="plain">
                <div class="form-group">
                    <label for="name1">Your Name</label>
                    <input type="name" name="Name" class="form-control" id="name1" placeholder="Your Name">
                </div>
                <div class="form-group">
                    <label for="email1">Email address</label>
                    <input type="email" name="Mail" class="form-control" id="email1" placeholder="Enter email">
                </div>
                <div class="form-group">
                    <label>Your Text</label>
                    <textarea class="form-control" name="Message" rows="3"></textarea>
                </div>
                <br>
                <button type="submit" class="btn btn-large btn-success">SUBMIT</button>
            </form>
        </div>
    </div>
</div>
<div id="c">
    <div class="container">
        <p>
            <strong>Copyright &copy; 2016. Powered by <a href="https://dwijitsolutions.com"><b>Dwij IT Solutions</b></a>
        </p>
    </div>
</div>


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{{ asset('/la-assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script>
    $('.carousel').carousel({
        interval: 3500
    })
</script>
</body>
</html>
