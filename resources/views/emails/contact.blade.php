<!DOCTYPE html> 
<html lang="es"> 
	<head>
		<meta charset="UTF-8">
		<style>
            *
            {
                font-family: arial, verdana, helvetica;
            }
            header, main, footer
            {
                border: solid 1px #ddd;
                padding: 15px;
                margin: 10px;
                header, footer
                {
                    background-color: #eee;
                    header {display: flex;}
                    header figure{flex:1}
                    header h1{flex:4}
                    .cursiva{font-style: italic}
                }
            }
        </style>
	</head>
	<body> 
		<header>
			<figure>
				<img src="{{asset('images/logos/logo.png')}}" alt="Logo"> 
			</figure>
			<h1>{{ config('app.name') }}</h1>
		</header>
		<main>
			<!--@dump($message)-->
			<h2>Mensaje recibido: {{ $messag->subject }}</h2>
			<p class="cursiva">De {{ $messag->name }}
				<a href="mailto: {{ $messag->email }}">&lt;{{ $messag->email }}&gt;</a> 
			</p>
			<p>{{ $messag->message }}</p>
		</main>
		<footer>
			<p>Aplicación creada por JJ para {{ $center }} como ejemplo de clase. Desarrollada haciendo uso de <b>Laravel</b> y <b>Bootstrap</b>.</p>
		</footer>
	</body>
</html>

			<!-- 
			<form class="col-7 my-2 border p-4" enctype="multipart/form-data"
					method="POST" action="{{route('contact.email')}}">
				<div class="form-group row my-4"> 
				<label for="inputFichero" class="form-label">Fichero (pdf):</label> 
				<input name="fichero" type="file" class="form-control-file"
					accept="application/pdf" id="inputFichero">
				</div>
			</form>
			 -->