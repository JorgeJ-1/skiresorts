<!DOCTYPE html> 
<html lang="es"> 
	<head>
		<meta charset="UTF-8">
		<style>
            *
            <!--    truco para incluir bootstrap en el mail        --> 
            @php
                include 'css/bootstrap.min.css';
            @endphp
        </style>
	</head>
	<body class='container p-3'> 
		<header class='container row bg-light p-4 my-4' >
			<figure class='img-fluid col-2'>
				<img src="{{asset('images/logos/logo.png')}}" alt="Logo"> 
			</figure>
			<h1 class='col-10'>{{ config('app.name') }}</h1>
		</header>
		<main>
			<!--@dump($message)-->
			<h2>Felicidades</h2>
			<h3>¡Has publicado tu primera estación de esquí</h3>
			<p> Tu primera estación de esquí {{$skiResort->name}} ya se ha incoporado a la World SkiResorts</p>
			<p> Tu estación de esquí mejora nuestra web y esperamos que te sea de mucha utilidad</p>
		</main>
		<footer class='page-footer font-small p-4 my-4 bg-light'>
			<p>Aplicación creada por JJ como ejemplo de clase. Desarrollada haciendo uso de <b>Laravel</b> y <b>Bootstrap</b>.</p>
		</footer>
	</body>
</html>
