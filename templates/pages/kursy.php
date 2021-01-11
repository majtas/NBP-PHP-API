<?php
	$values = $params['values'];
	$request = '';
	if(isset($_REQUEST['searching'])) {
		$request = $_REQUEST['searching'];
	}
	$selected = $request;
	?>
<h5>Wyszukaj odpowiedniego dla siebie kursu waluty. Aplikacja pobiera najbardziej aktualne dane z NBP.</h5>
<form class="form-inline" method="POST">
	<div class="form-group">
		<label class="my-1 mr-2">Wybierz kurs</label>
		<select class="form-control" name="searching">
		<?php foreach($values as $value) : ?>
			<option value="<?php echo $value?>" <?php echo $selected == $value ? 'selected' : '' ?>><?=strtoupper($value)?></option>
			<?php endforeach; ?>
		</select>
	</div>
  <button type="submit" class="btn btn-primary my-1">Wyszukaj</button>
</form>
<div class="container">
	<?php
		if($request == null)
			return;
		elseif($request == 'gold')
			include_once("kursy/zloto.php");
		else
			include_once("kursy/waluty.php");
	?>
</div>
