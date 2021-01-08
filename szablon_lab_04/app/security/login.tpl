{extends file="../../templates/main.tpl"}

{block name=footer}Kalkulator kredytowy stworzony na potrzeby ćwiczeń z przedmiotu aplikacje sieciowe{/block}

{block name=content}

	<h3>Logowanie</h3>


<form action="{$app_url}/app/security/login.php" method="post" >
	<div class="row mb-3">
		<label for="id_login" class="col-sm-2 col-form-label">Login:</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="login" id="id_login" value="{($form['login'])}"/>
		</div>
	</div>
	<div class="row mb-3">
		<label for="id_pass" class="col-sm-2 col-form-label">Password:</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" name="pass" id="id_pass" value="{($form['login'])}"/>
		</div>
	</div>
	<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<input type="submit" value="zaloguj" class="btn btn-primary"/>
			</div>
		</div>
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