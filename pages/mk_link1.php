<?php

function mk_link1 ($year,$season,$filename,$text,$color) {

$exppath=$GLOBALS["exppath"];
$expurl=$GLOBALS["expurl"];
                                                    { $zref = "                                              <font color=#808080> <u> $text </u> </font>     "; }
     if (file_exists("$exppath/$year/$filename"))         { $zref = "<a href=$expurl/$year/$filename target=''>         <font color=$color>      $text      </font> </a>"; }
     if (file_exists("$exppath/$year/$season/$filename")) { $zref = "<a href=$expurl/$year/$season/$filename target=''> <font color=$color>      $text      </font> </a>"; }

     $content = <<<EOF
     <li> $zref
EOF;
echo $content;
return; }

?>
