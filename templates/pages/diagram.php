<?php
	$values = $params['values'];
	$selected = '';
	if(isset($_REQUEST['searching'])) {
		$selected = $_REQUEST['searching'];
	}
	?>
<h5>Tutaj możemy sprawdzić diagram danych historycznych. Wybierz insteresującą Cię walutę. Zostaną pobrane dane sprzed 2 miesięcy oraz wygenerowane do diagramu.</h5>
<form class="form-inline" method="POST">
	<div class="form-group">
		<label class="my-1 mr-2">Wybierz kurs</label>
		<select class="form-control" name="searching">
		<?php foreach($values as $value) : ?>
			<?php if($value === 'gold') continue; ?>
			<option value="<?php echo $value?>" <?php echo $selected == $value ? 'selected' : '' ?>><?=strtoupper($value)?></option>
			<?php endforeach; ?>
		</select>
	</div>
  <button type="submit" class="btn btn-primary my-1">Wyszukaj</button>
</form>
<div id="diagram" style="height: 350px;"></div>
<?php if($_SERVER['REQUEST_METHOD'] === 'POST') : ?>
<script>
	window.onload = function() {
		new Morris.Bar({
			element: 'diagram',
			data: <?php echo $params['diagram'] ?>,
			xkey: 'date',
			ykeys: ['ask', 'bid'],
			labels: ['Kupno', 'Sprzedaż'],
			resize: true
		});
	}
</script>
<?php endif; ?>

