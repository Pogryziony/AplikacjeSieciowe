<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
    <base href="<?php print(_APP_URL);?>/" >    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous" <meta charset="utf-8" />
    <title>Kalkulator kredytowy</title>
</head>
<body>
    
    <div style="width:90%; margin: 2em auto;">
            <a href="<?php print(_APP_ROOT); ?>/application/inna_chroniona.php" class="btn btn-info">Kolejna chroniona strona</a>
            <a href="<?php print(_APP_ROOT); ?>/application/security/logout.php" class="btn btn-danger">Wyloguj</a>
    </div>
    
    
<h1 align="center"> Kalkulator kredytowy</h1>
    
    <div style="width:90%; margin: 2em auto;">

		<form action="<?php print(_APP_ROOT); ?>/application/calc.php" method="post" class="form-horizontal">
                    <div class="form-group" style="margin-bottom: ">
			<label for="id_loanValue" class = "col-sm-2 control-label">Wartość kredytu: </label>
			<input id="id_loanValue" type="text" name="loanValue" class="form-control" value="<?php if(isset($loanValue)) print($loanValue); ?>" /><br /><br />
                        </div>
                        <div class="form-group">
                        <label for="id_numberOfMonths" class = "col-sm-2 control-label">Ilość miesięcy: </label>
			<input id="id_numberOfMonths" type="text" class="form-control" name="numberOfMonths" value="<?php if(isset($numberOfMonths)) print($numberOfMonths); ?>" /><br /><br />
                        </div>
                        <div class="form-group">
                        <label for="id_interestRate" class = "col-sm-2 control-label">Stopa oprocentowania: </label>
			<input id="id_interestRate" type="text" class="form-control" name="interestRate" value="<?php if(isset($interestRate)) print($interestRate); ?>" /><br /><br />
			<div class="form-group">
                            <div class="col-sm-offset-2 col-sm-10">
                                <input type="submit" class="btn btn-primary" value="Oblicz" />
                            </div>
                        </div>
		</form>	

	<?php 
	//wyświeltenie listy błędów, jeśli istnieją
	if (isset($messages)) {
            if (count ( $messages ) > 0) {
			echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
			foreach ( $messages as $key => $msg ) {
				echo '<li>'.$msg.'</li>';
			}
			echo '</ol>';
            }
	}
	?>

	<?php if (isset($result)){ ?>
	<div style="margin: 2em; padding: 1em; border-radius: 0.5em; background-color: #ff0; width:25em;">
	<?php echo 'Miesięczna rata kredytu: '.$result; ?>
	</div>
	<?php } ?>
</div>
</body>
</html>