<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
	<meta charset="utf-8" />
	<title>Logowanie</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" <meta charset="utf-8" />
</head>
<body>

<div style="width:90%; margin: 2em auto;">


    <form action="<?php print(_APP_ROOT); ?>/app/security/login.php" method="post" class="form-horizontal">
            <legend>Logowanie</legend>
            
            <div class="form-group">
                <label for="id_login" class="col-sm-2 control-label">Login: </label>
                <div class="col-sm-10">
                <input id="id_login" type="text" class="form-control" name="login" value="<?php out($form['login']); ?>" />
                </div>
            </div>
            <div class="form-group">
                <label for="id_pass" class="col-sm-2 control-label">Password: </label>
                <div class="col-sm-10">
                <input id="id_pass" class="form-control"  type="password" name="pass" />
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                <input type="submit" value="zaloguj" class="btn btn-primary"/>
                </div>
            </div>
    </form>	

<?php
//wyświeltenie listy błędów, jeśli istnieją
if (isset($messages)) {
	if (count ( $messages ) > 0) {
		echo '<ol style="padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
		foreach ( $messages as $key => $msg ) {
			echo '<li>'.$msg.'</li>';
		}
		echo '</ol>';
	}
}
?>

</div>
<!-- Scripts -->
<script src="{$app_url}/js/html5shiv.js"></script>
<script src="{$app_url}/js/template.js"></script>
</body>
</html>