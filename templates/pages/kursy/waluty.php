<?php $params = $params['request']; ?>
<p>
		Sprawdzana waluta: <?php echo $params->code ?> na dzień <?php echo $params->rates[0]->effectiveDate ?>.
</p>
<p>Sprzedaż: <strong><?php echo $params->rates[0]->bid ?> zł</strong></p>
<p>Kupno: <strong><?php echo $params->rates[0]->ask ?> zł</strong></p>

