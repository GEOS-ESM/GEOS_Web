<?php

function mk_link3 ($year,$season,$name,$verification,$closeness,$text,$color) {

$exppath=$GLOBALS["exppath"];
$expurl=$GLOBALS["expurl"];

     if( $closeness == "none" ) {   $fcolor = "blue";
                                  $filename = "${name}_${verification}.${season}.gif"; }

     else                       {   $fcolor = "darkgreen";
                                  $filename = "${name}_${closeness}_closeness_${verification}.${season}.gif"; }

                                                    { $zref =                                               "<font color=#808080> <u> $text </u> </font>     "; }
     if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''>         <font color=$fcolor>     $text      </font> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''> <font color=$fcolor>     $text      </font> </a>"; }

     $content = <<<EOF
     $zref </li>
EOF;
echo $content;
return; }

?>
