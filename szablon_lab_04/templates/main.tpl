<!doctype html>
<html lang="pl">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="{$page_description|default:'Opis domyślny'}">
	<title>{$page_title|default:"Tytuł domyślny"}</title>
	<link rel="shortcut icon" href="{$app_url}/images/gt_favicon.png">
	<!-- Bootstrap -->
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.no-icons.min.css" rel="stylesheet">
	<!-- Icons -->
	<link href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
	<!-- Fonts -->
	<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Alice|Open+Sans:400,300,700">
	<!-- Custom styles -->
	<link rel="stylesheet" href="{$app_url}/assets/css/styles.css">

	<!--[if lt IE 9]> <script src="assets/js/html5shiv.js"></script> <![endif]-->

</head>

<body>

<!-- Navbar -->

<nav class="navbar navbar-default navbar-sticky">
	<div class="container-fluid" >

		<div class="navbar-header">
			<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
		</div>

		<div class="navbar-collapse collapse" align="right">

			<ul class="nav navbar-nav" >
				<li class="active"><a href="{$app_url}/index.php">Home</a></li>
				<li><a href="{$app_url}/app/security/login.php">Login</a></li>
			</ul>

		</div>

	</nav>
<!-- Navbar -->

<!-- Header -->
</header>

<header class="header">
		<div id="head" class="parallax" parallax-speed="2" align="center">

					<h1>{$page_title|default:"Tytuł domyślny"}</h1>
					<h2>{$page_header|default:"Tytuł domyślny"}</h2>
					<h3>{$page_description|default:"Opis domyślny"}</h3>
	</div>
</header>
<!-- /Header -->


<!-- Content -->
<main id="main">
	<div class="container">
		{block name=content} Domyślna treść zawartości .... {/block}
	</div>
</main>
<!-- content -->
</br>
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-md-4 widget">
				<h3 class="widget-title">Kontakt</h3>
				<div class="widget-body">
					<p>
						<a href="mailto:#">adamchrostek98@wp.pl</a><br>
					</p>
				</div>
			</div>

			<div class="col-md-4 widget">
				<h3 class="widget-title">Gdzie mnie znaleźć</h3>
				<div class="widget-body">
					<p class="follow-me-icons">
						<a href="https://github.com/pogryziony"><i class="fa fa-github fa-2"></i></a>
						<a href="https://www.linkedin.com/in/adamchrostek/"><i class="fa fa-linkedin fa-2"></i></a>
					</p>
				</div>
			</div>

			<div class="col-md-4 widget">
				<h3 class="widget-title">Cel ćwiczenia</h3>
				<div class="widget-body">
					<p>{block name=footer} Domyślna treść stopki .... {/block}</p>
					<p>Widok stworzony w oparciu o style  <a href="https://getbootstrap.com/docs/5.0/getting-started/download/" target="_blank">Bootstrap</a>.</p>
				</div>
			</div>

		</div> <!-- /row of widgets -->
	</div>
</footer>

<footer id="underfooter">
	<div class="container">
		<div class="row">
			<div class="col-md-12 widget">
				<div class="widget-body">
					<p class="text-right">
						Copyright &copy; 2020, Adam Chrostek<br>
						Design: <a href="http://www.gettemplate.com" rel="designer">Initio by GetTemplate</a> </p>
				</div>
			</div>

		</div> <!-- /row of widgets -->
	</div>
</footer>

<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="assets/js/template.js"></script>

</body>
</html>
