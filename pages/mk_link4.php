<?php

function mk_link4 ($year,$season,$name,$gc,$verification,$closeness,$text,$color) {

$verbose = 0;

$exppath=$GLOBALS["exppath"];
$expurl=$GLOBALS["expurl"];

if( $verbose != 0)
{  print "YEAR: <b> $year </b> <br>";
   print "SEASON: <b> $season </b> <br>";
   print "NAME: <b> $name </b> <br>";
   print "GCs: <b> $gc </b> <br>";
   print "VERIFICATION: <b> $verification </b> <br>";
   print "CLOSENESS: <b> $closeness </b> <br>"; }

     if( $closeness == "none" & $verification == "" ) 
                                {   $fcolor = "blue";
                                  $filename = "${name}_${gc}.${season}.gif"; }

     else if( $closeness == "none" )
                                {   $fcolor = "blue";
                                  $filename = "${name}_${verification}_${gc}.${season}.gif"; }

     else                       {   $fcolor = "darkgreen";
                                  $filename = "${name}_${closeness}_${gc}_closeness_${verification}.${season}.gif"; }

if( $verbose != 0) {print "FILENAME: <b> $filename </b> <br>";}

                                                    { $zref =                                               "<font color=#808080> <u> $text </u> </font>     "; }
     if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''>         <font color=$fcolor>     $text      </font> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''> <font color=$fcolor>     $text      </font> </a>"; }

     $content = <<<EOF
     $zref </li>
EOF;
echo $content;
return; }

?>
