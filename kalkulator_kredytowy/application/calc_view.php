<!DOCTYPE HTML>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="pl" lang="pl">
<head>
<link rel="stylesheet" href="style.css">
<meta charset="utf-8" />
<title>Kalkulator kredytowy</title>
</head>
<body>

<div id='title' align='center'>
	<h1 text-align="center"> Kalkulator kredytowy</h1>
</div>

<div class='center-site'>
	<div class='form' float='left'>
		<form action="<?php print(_APP_URL);?>/application/calc.php" method="post">
			<label for="id_loanValue" class = "label loanValue">Wartość kredytu: </label>
			<input id="id_loanValue" type="text" name="loanValue" value="<?php if(isset($loanValue)) print($loanValue); ?>" /><br /><br />
			<label for="id_numberOfMonths" class = "label numberOfMonths">Ilość miesięcy: </label>
			<input id="id_numberOfMonths" type="text" name="numberOfMonths" value="<?php if(isset($numberOfMonths)) print($numberOfMonths); ?>" /><br /><br />
			<label for="id_interestRate" class = "label interestRate">Stopa oprocentowania: </label>
			<input id="id_interestRate" type="text" name="interestRate" value="<?php if(isset($interestRate)) print($interestRate); ?>" /><br /><br />
			<input type="submit" value="Oblicz" />
		</form>	
	</div>

	<div class='informations' float='right'>
		
		
	</div>
</div>

<div id='result'>
	<?php 
	//wyświeltenie listy błędów, jeśli istnieją
	if (isset($messages)) {
			echo '<ol style="margin: 20px; padding: 10px 10px 10px 30px; border-radius: 5px; background-color: #f88; width:300px;">';
			foreach ( $messages as $key => $msg ) {
				echo '<li>'.$msg.'</li>';
			}
			echo '</ol>';
	}
	?>

	<?php if (isset($result)){ ?>
	<div style="margin: 20px; padding: 10px; border-radius: 5px; background-color: #ff0; width:300px;">
	<?php echo 'Miesięczna rata kredytu: '.$result; ?>
	</div>
	<?php } ?>
</div>


</body>
</html>