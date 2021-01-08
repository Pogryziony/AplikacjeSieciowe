{extends file="../templates/main.tpl"}

{block name=footer}Kalkulator kredytowy stworzony na potrzeby ćwiczeń z przedmiotu aplikacje sieciowe{/block}

{block name=content}

<h3>Kalkulator kredytowy</h3>


	<form action="{$app_url}/app/calc.php" method="post" >
		<div class="row mb-3">
			<label for="id_loanValue" class="col-sm-2 col-form-label">Wartość kredytu:</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" name="loanValue" id="id_loanValue" value="{$form['loanValue']}"/>
			</div>
		</div>
		<div class="row mb-3">
			<label for="id_numberOfMonths" class="col-sm-2 col-form-label">Ilość miesięcy:</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" name="numberOfMonths" id="id_numberOfMonths" value="{$form['numberOfMonths']}"/>
			</div>
		</div>
		<div class="row mb-3">
			<label for="id_interestRate" class="col-sm-2 col-form-label">Stopa oprocentowania:</label>
			<div class="col-sm-3">
				<input type="text" class="form-control" name="interestRate" id="id_interestRate" value="{$form['interestRate']}"/>
			</div>
		</div>
		<input  type="submit" class="btn btn-primary" value="Oblicz" />
		<br>
	</form>


<div class="messages">

{* wyświeltenie listy błędów, jeśli istnieją *}
{if isset($messages)}
	{if count($messages) > 0} 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		{foreach  $messages as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{* wyświeltenie listy informacji, jeśli istnieją *}
{if isset($infos)}
	{if count($infos) > 0} 
		<h4>Informacje: </h4>
		<ol class="inf">
		{foreach  $infos as $msg}
		{strip}
			<li>{$msg}</li>
		{/strip}
		{/foreach}
		</ol>
	{/if}
{/if}

{if isset($result)}
	<h4>Miesięczna rata kredytu</h4>
	<p class="res">
		Twoja miesięczna rata kredytu wynosi {$result} zł.
	</p>
{/if}

</div>
	<!-- Scripts -->
	<script src="{$app_url}/js/html5shiv.js"></script>
	<script src="{$app_url}/js/template.js"></script>
{/block}