<!doctype html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<title></title>

		<link rel="stylesheet" href="http://yui.yahooapis.com/pure/0.6.0/pure-min.css">
		<link rel="stylesheet" href="assets/css/layouts/side-menu.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
		<script src="assets/js/ui.js"></script>
	</head>
	<body>

<?<?php 
	include('conexao.php');
	include('cadastros_array.php');
	include('funcoes.php');
?>

		<div id="layout">
		    <!-- Menu toggle -->
		    <a href="#menu" id="menuLink" class="menu-link">
		        <!-- Hamburger icon -->
		        <span></span>
		    </a>

		    <div id="menu">
		        <div class="pure-menu">
		            <a class="pure-menu-heading" href="">Home</a>

		            <ul class="pure-menu-list">
		                <li class="pure-menu-item"><a href="index.php?pagina=pegar_tudo" class="pure-menu-link">Pegar tudo</a></li>
		                <li class="pure-menu-item"><a href="index.php?pagina=pegar_tudo_mes" class="pure-menu-link">Pegar tudo mes</a></li>
		                <li class="pure-menu-item"><a href="index.php?pagina=pegar_tudo_semana" class="pure-menu-link">Pegar tudo sem</a></li>
		                <li class="pure-menu-item"><a href="index.php?pagina=pegar_tudo_dia" class="pure-menu-link">Pegar tudo dia</a></li>

		                <li class="pure-menu-item" class="menu-item-divided pure-menu-selected">
		                    <a href="#" class="pure-menu-link">Services</a>
		                </li>

		                <li class="pure-menu-item"><a href="#" class="pure-menu-link">Contact</a></li>
		            </ul>
		        </div>
		    </div>

		    <div id="main">
				<?php 

				if(isset($_GET['pagina']))
				{
					$pagina = $_GET['pagina'];
					if($pagina == 'pegar_tudo') 
					{
						include('pegar_tudo');
					}
				}
				else
				{
					include('home.php');
				}

				?>
		    </div>
		</div>
	</body>
</html>