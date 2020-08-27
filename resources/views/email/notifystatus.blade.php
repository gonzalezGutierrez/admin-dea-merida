<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cuenta Activada</title>
	<link href="https://fonts.googleapis.com/css2?family=Play:wght@700&display=swap" rel="stylesheet">
</head>
<body>
	<style>
		.body-page{
    height:100vh;
    display:flex;
    align-items:center;
    justify-content:center;
  }
  .boton{
    text-decoration:none;
    color: rgb(0, 0, 0);
    background-color: rgb(202, 192, 192);
    padding: .5em 1em;
    border-bottom-color: #222;
    border-bottom-width: 2px;
    border-bottom-style: solid;
    align-self:center;
  }
  #vmodal { 
    background-color:#000;
    color: #fff;
    position: fixed;
    top:0;
    left:-100vw;
    width:100vw;
    height: 100vh;
    transition: all .5s;
    font-family:'Roboto';
  
  }
  #vmodal:target{
    display:flex;
    align-items:center;
    justify-content:center;
    left:0;
  }
  .cerrar{
    display:flex;
    position:absolute;
    top:0;
    right:0;
    padding:.5em;
    background-color: tomato;
    color:#fff;
    text-decoration:none;
    font-size:.7em;
    box-sizing:justify;
  }
  .parrafo{
    width:70%;
    text-align:justify;
  }
  
  .letra{
    font-family: 'Play', sans-serif;
  }
	</style>
	<header>
		<div class="body-page">
			<h3 style="color:#1671c5; font-family: 'Play', sans-serif;">¡FELICIDADES! <br> Cuenta Activada Ya puedes acceder a nuestra plataforma <br> Ya puedes acceder a nuestra plataforma<br> <br><br><a class="boton" href="http://127.0.0.1:8000/">Aceptar</a></h3>
			
		</div>	
	</header>
</body>
</html>