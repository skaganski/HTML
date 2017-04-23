<?php
$text_bg="#fff";
if (isset($_POST['bg']))
    $text_bg = htmlspecialchars($_POST['bg']);

$text_color="#fff";
if (isset($_POST['tc']))
    $text_color = htmlspecialchars($_POST['tc']);

$border_width =2;
if (isset($_POST['bw']) )
    $border_width = htmlspecialchars($_POST['bw']);
$border_style =" solid ";
if (isset($_POST['bs']) )
    $border_style = htmlspecialchars($_POST['bs']);
$border_color =" black ";
if (isset($_POST['bc']) )
    $border_color = htmlspecialchars($_POST['bc']);
$border=$border_color." ".$border_style." ".$border_width;

$border_radius =10;
if (isset($_POST['br']) )
    $border_radius = htmlspecialchars($_POST['br']);

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Ülesanne 10.1</title>

    <style type="text/css">

        #text { background: <?php echo $text_bg; ?>;
            color: <?php echo $text_color; ?>;
            border:  <?php echo $border; ?>px;
            border-radius: <?php echo $border_radius; ?>px;
            padding:10px;
            min-height:100px;
            max-width: 400px;
        }

    </style>

</head>
<body>

    <?php

    $stiilid=array("solid", "dashed", "dotted", "none", "double");

    ?>

    <div id="text"> <?php if (isset($_POST['text'])) echo htmlspecialchars($_POST['text']); ?></div>

    <hr/>
    <form method="POST" action="?">
        <textarea name="text" <?php if(!empty($_POST['text'])) {echo "placeholder=\"".htmlspecialchars($_POST['text'])."\" ";} else {echo "placeholder=\"Lisa tekst\" ";} ?>></textarea>
        <br/>
        <input type="color" name="bg" id="bg"
        <?php if(!empty($_POST['bg'])) echo "value=\"".htmlspecialchars($_POST['bg'])."\" "; ?> >
        <label for="bg">Taustavärvus</label>
        <br/>
        <input type="color" name="tc" id="tc"
        <?php if(!empty($_POST['tc'])) echo "value=\"".htmlspecialchars($_POST['tc'])."\" "; ?>>
        <label for="tc">Tekstivärvus</label>
        <br/>
        <fieldset>
            <legend>Piirjoon</legend>
            <input type="number" min="0" max="20" step="1" name="bw" id="bw"
            <?php if(!empty($_POST["bw"]) && is_numeric($_POST["bw"])) echo "value=\"".htmlspecialchars($_POST['bw'])."\" "; ?>>
            <label>Piirjoone laius (0-20px)</label>
            <br/>
            <select name="bs">
                <?php foreach($stiilid as $stiil):?>
                    <option><?php if(!empty($_POST['bs'])&& $_POST['bs']==$stiil) echo "selected" ?>><?php echo $stiil; ?></option>
                <?php endforeach; ?>
            </select>
            <br/>
            <input type="color" name="bc" id="bc"
            <?php if(!empty($_POST['bc'])) echo "value=\"".htmlspecialchars($_POST['bc'])."\" "; ?>>
            <label for="bc">Piirjoone värvus</label>
            <br/>
            <input type="number" min="0" max="100" step="1" name="br" id="br"
            <?php if(!empty($_POST["br"]) && is_numeric($_POST["br"])) echo "value=\"".htmlspecialchars($_POST['br'])."\" "; ?>>
            <label>Piirjoone nurga raadius (0-100px)</label>
            <br/>
        </fieldset>
        <input type="submit" value="esita" />
    </form>

</body>
</html>
