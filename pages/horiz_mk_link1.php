<?php

function mk_link1 ($year,$season,$filename,$color) {

                                                    { $zref = "&nbsp;"; } 
     if (file_exists("../$year/$filename"))         { $zref = "<a href=../$year/$filename target=''>        <img src=../check.jpg border=0> </a>"; } 
     if (file_exists("../$year/$season/$filename")) { $zref = "<a href=../$year/$season/$filename target=''><img src=../check.jpg border=0> </a>"; } 

     $content = <<<EOF
     <td align=center bgcolor = $color >
     $zref
    </td>
EOF;
echo $content;
return; }

?>
