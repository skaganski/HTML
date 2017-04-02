<!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8"></meta>
     <title>Cars</title>
     <style>
       .result{
         border: solid #ca9fce 2px;
         border-radius: 5px;
         display: inline-block;
         width: 15%;
         height: 150px;
         background-color: yellow;
         margin: 5px;
         padding: 10px;
         font-family:cursive;
       }

       p {
         margin-top: 7px;
         margin-bottom: 7px;
       }
     </style>
   </head>

<body>
   <?php
       $cars = array(
         array("carMarc" => "VW", "engine" => "1.8 TSI", "power" => "118kW", "transmission" => "DSG"),
         array("carMarc" => "Audi", "engine" => "2.0 FSI", "power" => "132kW", "transmission" => "manual"),
         array("carMarc" => "Honda", "engine" => "2.0 i-VTEC", "power" => "114kW", "transmission" => "manual"),
         array("carMarc" => "Toyota", "engine" => "2.0 VVT", "power" => "112kW", "transmission" => "manual"),

       );
       foreach ($cars as $result) {
      include "yl731.html";
      }
   ?>
 </body>
 </html>
