
<?php require_once('head.html');
$gallery = array(
			array("pilt" => "pildid/nameless1.jpg","alt" => "ilmanimeta 1"),
			array("pilt" => "pildid/nameless2.jpg","alt" => "ilmanimeta 2"),
			array("pilt" => "pildid/nameless3.jpg","alt" => "ilmanimeta 3"),
			array("pilt" => "pildid/nameless4.jpg","alt" => "ilmanimeta 4"),
			array("pilt" => "pildid/nameless5.jpg","alt" => "ilmanimeta5"),
			array("pilt" => "pildid/nameless6.jpg","alt" => "ilmanimeta 6")
		);
    $page = "default";
    if (!empty($_GET["page"])) {
    			$page = $_GET["page"];}
    		else {
    			$page = "pealeht";}
	switch ($page) {
	    case "galerii":
      require("galerii.html");
      break;
	    case "vote":
      require("vote.html");
      break;
	    case "tulemus":
      require("tulemus.html");
      break;
	    default:
      require("pealeht.html");
      break;
	}
require_once('foot.html');
?>
