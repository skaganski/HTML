<?php require_once('head.html');


	$gallery = array(
			array("pilt" => "pildid/nameless1.jpg","alt" => "ilmanimeta 1"),
			array("pilt" => "pildid/nameless2.jpg","alt" => "ilmanimeta 2"),
			array("pilt" => "pildid/nameless3.jpg","alt" => "ilmanimeta 3"),
			array("pilt" => "pildid/nameless4.jpg","alt" => "ilmanimeta 4"),
			array("pilt" => "pildid/nameless5.jpg","alt" => "ilmanimeta 5"),
			array("pilt" => "pildid/nameless6.jpg","alt" => "ilmanimeta 6")
		);

		?>
		<h3>Fotod</h3>
    <div id="gallery">
			<?php foreach($gallery as $i=>$value) :?>
			<img src="<?php echo $value['pilt']; ?>" alt="<?php echo $value['alt']; ?>"/>
		<?php endforeach; ?>
    </div>

<?php require_once('foot.html'); ?>
