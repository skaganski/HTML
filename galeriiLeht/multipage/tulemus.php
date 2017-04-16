<?php require_once('head.html'); ?>
	<h3>Valiku tulemus</h3>

	<?php if (empty($_GET))
	{
		echo "<p>Vali pilt!</p>";
	} else
	{
		echo "Hääletasid nr " . $_GET["value"] . " poolt.";
	} ?>
<?php require_once('foot.html'); ?>
