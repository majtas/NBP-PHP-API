<?php
	$values = $params['values'];
	$request = '';
	if(isset($_REQUEST['searching'])) {
		$request = $_REQUEST['searching'];
	}
	$selected = $request;
	?>
<form class="form-inline" method="POST">
  <label class="my-1 mr-2" for="inlineFormCustomSelectPref">Wybierz kurs</label>
  <select class="custom-select my-1 mr-sm-2" id="inlineFormCustomSelectPref" name="searching">
	<?php foreach($values as $value) : ?>
    <option value="<?php echo $value?>" <?php echo $selected == $value ? 'selected' : '' ?>><?=strtoupper($value)?></option>
		<?php endforeach; ?>
  </select>
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
