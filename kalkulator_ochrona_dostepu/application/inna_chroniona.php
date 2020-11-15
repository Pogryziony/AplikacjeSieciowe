<?php
require_once dirname(__FILE__).'/../config.php';
//ochrona widoku
include _ROOT_PATH.'/application/security/check.php';
?>
<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Chroniona strona</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" <meta charset="utf-8" />
</head>
<body>

<div style="width:90%; margin: 2em auto;">
	<a href="<?php print(_APP_ROOT); ?>/application/calc.php" class="btn btn-primary">Powrót do kalkulatora</a>
	<a href="<?php print(_APP_ROOT); ?>/application/security/logout.php" class="btn btn-danger">Wyloguj</a>
</div>

<div style="width:90%; margin: 2em auto;">
	<p>To jest inna chroniona strona aplikacji internetowej</p>
</div>	

</body>
</html>