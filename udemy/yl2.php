<!DOCTYPE html> 
<html lang="en">
   <head>
      <meta charset="utf-8" />
      <title>Kommentaaride lisamise vorm</title>
   </head>
   <body>
      <form name ="getForm" action ="yl2.php" onsubmit="return true;" method="GET">
         <table> <!-- <table border="1"> -->
            <tr>
               <th>Nimi</th>
               <td><input name="nimi" type="text" maxlength="30"> </td>
            </tr>
            <tr>
               <th>Kommentaar</th>
               <td><textarea name="kommentaar" rows="3" cols="22" maxlength="255"></textarea> </td>
            </tr>
            <tr>
               <td><input type="submit" name="submit1" onclick="writeData()" value="Lisa" class="button" /></td>
               <td><input type="submit" name="submit2" onclick="getData()" value="Naita" class="button" /></td>
            </tr> <!--&nbsp;-->
         </table>
      </form>
<?php
if ($_GET) {
    if (isset($_GET['submit1'])) {
        writeData();
    } elseif (isset($_GET['submit2'])) {
        getData();
    }
}
function writeData()
{
    $myfile = fopen("yl2.txt", "w") or die("Unable to open file!");
    $nimi       = htmlspecialchars($_GET['nimi']);
    $kommentaar = htmlspecialchars($_GET['kommentaar']);
    $txt        = $nimi . " " . $kommentaar . "\n";
    fwrite($myfile, $txt);
    //fwrite($myfile, "\n");
    fclose($myfile);
}
function getData()
{
    $myfile = fopen("yl2.txt", "r") or die("Unable to open file!");
    // Output one line until end-of-file
    while (!feof($myfile)) {
        echo fgets($myfile) . "\n <br>";
    }
    fclose($myfile);
}
?>
   </body>
</html>